<?php

namespace App\Http\Controllers;

use Excel;
use App\Exports\peminjamanBarangSiswaExport;
use App\Exports\peminjamanBarangGuruExport;
use App\Exports\peminjamanKunciGuruExport;
use App\Exports\peminjamanKunciSiswaExport;

class ExcelController extends Controller
{
    public function peminjamanBarangSiswaexcel()
    {
        $nama_file = 'laporan_peminjaman_barang_siswa_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new peminjamanBarangSiswaExport, $nama_file);
    }

    public function peminjamanBarangGuruexcel()
    {
        $nama_file = 'laporan_peminjaman_barang_guru_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new peminjamanBarangGuruExport, $nama_file);
    }

    public function peminjamanKunciSiswaexcel()
    {
        $nama_file = 'laporan_peminjaman_kunci_siswa_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new peminjamanKunciSiswaExport, $nama_file);
    }

    public function peminjamanKunciGuruexcel()
    {
        $nama_file = 'laporan_peminjaman_kunci_guru_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new peminjamanKunciGuruExport, $nama_file);
    }
}
