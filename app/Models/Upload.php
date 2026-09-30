<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_file',
        'path_file',
        'jumlah_data',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function datasetTanaman()
    {
        return $this->hasMany(DatasetTanaman::class);
    }
}
