<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RekomendasiController extends Controller
{
    public function prosesRekomendasi(Request $request)w
    {
        // Map input form ke fitur model
        $input = [
            "Intensitas Cahaya (Kategori)" => $request->input('sunlight'),
            "Intensitas Air (Kategori)" => $request->input('intensitas_air', ''),
            "Cara Penyiraman (Frekuensi)" => $request->input('cara_penyiraman', ''),
            "Konsep Utama Taman" => $request->input('konsep_taman'),
            "Ukuran Taman yang Cocok (Kategori)" => $request->input('ukuran_taman'),
            "Lokasi Penanaman (Indoor/Outdoor)" => $request->input('indoor_use'),
        ];

        // Validasi input wajib
        $required = [
            'sunlight' => 'Intensitas Cahaya (Kategori)',
            'konsep_taman' => 'Konsep Utama Taman',
            'ukuran_taman' => 'Ukuran Taman yang Cocok (Kategori)',
            'indoor_use' => 'Lokasi Penanaman (Indoor/Outdoor)'
        ];

        $missing = [];

        foreach ($required as $field => $label) {
            if (empty($request->input($field))) {
                $missing[] = $label;
            }
        }

        if (count($missing) > 0) {
            $msg = 'Field berikut wajib diisi: ' . implode(', ', $missing);

            if ($request->ajax()) {
                return response()->json([
                    'error' => $msg
                ], 422);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', $msg);
        }

        try {
            // Kirim data ke Flask lokal
            $response = Http::post(
                'http://127.0.0.1:5000/predict',
                $input
            );
        } catch (\Exception $e) {
            $msg = 'Gagal menghubungi server rekomendasi: ' . $e->getMessage();

            if ($request->ajax()) {
                return response()->json([
                    'error' => $msg
                ], 500);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', $msg);
        }

        if ($response->failed()) {
            $msg = 'Terjadi kesalahan pada server rekomendasi.';

            if ($response->json('error')) {
                $msg = $response->json('error');
            }

            if ($request->ajax()) {
                return response()->json([
                    'error' => $msg
                ], $response->status());
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', $msg);
        }

        $top_types = $response->json('top_types') ?? [];
        $rekomendasi = $response->json('rekomendasi') ?? [];

        if ($request->ajax()) {
            return response()->json([
                'top_types' => $top_types,
                'rekomendasi' => $rekomendasi
            ]);
        }

        return view(
            'landing.rekomendasi',
            compact('rekomendasi')
        );
    }
}
