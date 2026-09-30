<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatasetTanaman extends Model
{
    use HasFactory;

    protected $table = 'dataset_tanaman';

    protected $fillable = [
        'nama_tanaman',
        'tipe_utama_tanaman',
        'intensitas_cahaya_kategori',
        'intensitas_air_kategori',
        'cara_penyiraman_frekuensi',
        'konsep_utama_taman',
        'ukuran_taman_cocok_kategori',
        'lokasi_penanaman',
        'upload_id',
    ];

    public function upload()
    {
        return $this->belongsTo(Upload::class);
    }
}
