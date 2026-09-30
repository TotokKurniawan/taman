<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatasetTanaman;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DatasetController extends Controller
{
    public function index()
    {
        $uploads = Upload::with('user')
            ->latest()
            ->get();

        $jumlahData = DatasetTanaman::count();

        return view('admin.dataset.index', compact(
            'uploads',
            'jumlahData'
        ));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:csv,txt',
                'max:10240'
            ],
        ]);

        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();

        $path = $file->store(
            'dataset',
            'public'
        );

        $upload = Upload::create([
            'user_id' => Auth::id(),
            'nama_file' => $namaFile,
            'path_file' => $path,
            'jumlah_data' => 0,
            'status' => 'diproses',
        ]);

        try {
            $filePath = storage_path('app/public/' . $path);
            $handle = fopen($filePath, 'r');

            if ($handle === false) {
                throw new \Exception('File tidak dapat dibaca.');
            }

            // Deteksi delimiter
            $firstLine = fgets($handle);
            if ($firstLine === false) {
                throw new \Exception('File CSV kosong.');
            }

            $semicolonCount = substr_count($firstLine, ';');
            $commaCount = substr_count($firstLine, ',');
            $tabCount = substr_count($firstLine, "\t");

            if ($semicolonCount > $commaCount && $semicolonCount > $tabCount) {
                $delimiter = ';';
            } elseif ($tabCount > $commaCount && $tabCount > $semicolonCount) {
                $delimiter = "\t";
            } else {
                $delimiter = ',';
            }

            rewind($handle);

            // Baca Header
            $header = fgetcsv($handle, 0, $delimiter);
            if ($header === false) {
                throw new \Exception('Header CSV tidak dapat dibaca.');
            }

            // Bersihkan Header
            $header = array_map(function ($value) {
                $value = preg_replace('/^\xEF\xBB\xBF/', '', $value);
                return trim($value);
            }, $header);

            $jumlahKolom = count($header);

            if ($jumlahKolom === 9) {
                $headerPertama = strtolower(trim($header[0]));
                if ($headerPertama === 'id' || $headerPertama === 'no' || $headerPertama === 'nomor') {
                    array_shift($header);
                } else {
                    throw new \Exception('CSV memiliki 9 kolom, tetapi kolom pertama bukan ID.');
                }
            }

            if (count($header) !== 8) {
                throw new \Exception('Format CSV tidak sesuai. Dataset harus memiliki 8 kolom data.');
            }

            // Baca Data & Simpan ke DB
            $jumlahData = 0;

            while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
                if (count($row) === 1 && trim($row[0]) === '') {
                    continue;
                }

                if ($jumlahKolom === 9) {
                    if (count($row) !== 9) continue;
                    array_shift($row);
                } else {
                    if (count($row) !== 8) continue;
                }

                $row = array_map(function ($value) {
                    return trim($value);
                }, $row);

                if (count($row) !== 8) continue;

                DatasetTanaman::create([
                    'nama_tanaman' => $row[0],
                    'tipe_utama_tanaman' => $row[1],
                    'intensitas_cahaya_kategori' => $row[2],
                    'intensitas_air_kategori' => $row[3],
                    'cara_penyiraman_frekuensi' => $row[4],
                    'konsep_utama_taman' => $row[5],
                    'ukuran_taman_cocok_kategori' => $row[6],
                    'lokasi_penanaman' => $row[7],
                    'upload_id' => $upload->id,
                ]);

                $jumlahData++;
            }

            fclose($handle);

            if ($jumlahData === 0) {
                $upload->update([
                    'jumlah_data' => 0,
                    'status' => 'gagal',
                ]);

                return back()->with('error', 'File CSV berhasil dibaca, tetapi tidak ada data yang dapat diimport.');
            }

            $upload->update([
                'jumlah_data' => $jumlahData,
                'status' => 'berhasil',
            ]);

            /*
            |--------------------------------------------------------------------------
            | KIRIM DATA TERBARU KE FLASK UNTUK RETRAINING OTOMATIS
            |--------------------------------------------------------------------------
            */
            try {
                $allData = DatasetTanaman::all();
                $tempCsvPath = storage_path('app/public/dataset/current_dataset.csv');
                $csvFile = fopen($tempCsvPath, 'w');

                // Tulis header CSV
                fputcsv($csvFile, [
                    'Nama Tanaman',
                    'Tipe Utama Tanaman',
                    'Intensitas Cahaya (Kategori)',
                    'Intensitas Air (Kategori)',
                    'Cara Penyiraman (Frekuensi)',
                    'Konsep Utama Taman',
                    'Ukuran Taman yang Cocok (Kategori)',
                    'Lokasi Penanaman (Indoor/Outdoor)'
                ], ';');

                // Masukkan seluruh baris data dari database
                foreach ($allData as $item) {
                    fputcsv($csvFile, [
                        $item->nama_tanaman,
                        $item->tipe_utama_tanaman,
                        $item->intensitas_cahaya_kategori,
                        $item->intensitas_air_kategori,
                        $item->cara_penyiraman_frekuensi,
                        $item->konsep_utama_taman,
                        $item->ukuran_taman_cocok_kategori,
                        $item->lokasi_penanaman
                    ], ';');
                }
                fclose($csvFile);

                // Kirim request ke Flask API
                $response = Http::attach(
                    'file',
                    file_get_contents($tempCsvPath),
                    'Book3.csv'
                )->post('http://127.0.0.1:5000//retrain');

                if (!$response->successful()) {
                    Log::warning('Gagal melatih ulang model di Flask: ' . $response->body());
                }
            } catch (\Exception $ex) {
                Log::error('Error saat mentrigger retrain Flask: ' . $ex->getMessage());
            }

            return back()->with(
                'success',
                "Dataset berhasil diupload. {$jumlahData} data berhasil diimport dan model ML telah diperbarui secara dinamis!"
            );
        } catch (\Exception $e) {
            if (isset($handle) && is_resource($handle)) {
                fclose($handle);
            }

            $upload->update([
                'status' => 'gagal',
            ]);

            return back()->with(
                'error',
                'Dataset gagal diproses: ' . $e->getMessage()
            );
        }
    }
}
