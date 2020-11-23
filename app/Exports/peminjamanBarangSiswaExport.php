<?php

namespace App\Exports;

use App\PeminjamanBarangSiswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class peminjamanBarangSiswaExport implements FromView
{
    public function view(): View
    {
        $peminjamanbarangsiswas = PeminjamanBarangSiswa::all();
        return view('peminjaman_barang_siswa/pdfpreview', compact('peminjamanbarangsiswas'));
    }
}
