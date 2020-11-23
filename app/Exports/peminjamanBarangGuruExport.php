<?php

namespace App\Exports;

use App\PeminjamanBarangGuru;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class peminjamanBarangGuruExport implements FromView
{
    public function view(): View
    {
        $peminjamanbaranggurus = PeminjamanBarangGuru::all();
        return view('peminjaman_barang_guru/pdfpreview', compact('peminjamanbaranggurus'));
    }
}