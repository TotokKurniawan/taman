<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatasetTanaman;
use App\Models\Upload;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahData = DatasetTanaman::count();

        $jumlahUpload = Upload::count();

        $uploadTerakhir = Upload::latest()->first();

        return view('admin.dashboard', compact(
            'jumlahData',
            'jumlahUpload',
            'uploadTerakhir'
        ));
    }

    public function tampilDataset()
    {
        return view(
            'admin.dataset.data',
            [
                'dataset' => DatasetTanaman::paginate(10)
            ]
        );
    }
}
