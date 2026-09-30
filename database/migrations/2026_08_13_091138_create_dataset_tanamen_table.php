<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dataset_tanaman', function (Blueprint $table) {
            $table->id();

            $table->string('nama_tanaman');

            $table->string('tipe_utama_tanaman');

            $table->string('intensitas_cahaya_kategori');

            $table->string('intensitas_air_kategori');

            $table->string('cara_penyiraman_frekuensi');

            $table->string('konsep_utama_taman');

            $table->string('ukuran_taman_cocok_kategori');

            $table->string('lokasi_penanaman');

            $table->foreignId('upload_id')
                ->nullable()
                ->constrained('uploads')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dataset_tanaman');
    }
};
