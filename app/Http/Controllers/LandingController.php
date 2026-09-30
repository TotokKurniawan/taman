<?php

namespace App\Http\Controllers;


class LandingController extends Controller
{
    public function landingpage()
    {

        // Mengirim data ke view
        return view('landing.home');
    }

    public function about()
    {

        // Tidak ada penambahan kunjungan di halaman about
        return view('landing.about');
    }

    public function rekomendasi()
    {
        $jumlahUser = 0; // Berikan nilai default atau ambil dari database jika ada
        return view('landing.rekomendasi', compact('jumlahUser'));
    }
    public function Service()
    {
        return view('landing.service');
    }
    public function Contact()
    {
        return view('landing.contact');
    }
}
