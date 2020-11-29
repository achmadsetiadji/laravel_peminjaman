<?php

namespace App\Http\Controllers;

use App\PeminjamanBarangSiswa;
use App\PeminjamanBarangGuru;
use App\PeminjamanKunciSiswa;
use App\PeminjamanKunciGuru;
use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function peminjamanBarangSiswapdf()
    {
        $date = session('sortMonthBarangSiswa');
        $peminjamanbarangsiswas = PeminjamanBarangSiswa::where('tanggal_pinjam', 'LIKE', '%' . $date . '%')->get();
        $pdf = 'PDF'::loadView('peminjaman_barang_siswa/pdfpreview', compact('peminjamanbarangsiswas'))->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_peminjaman_barang_siswa_' . date('Y-m-d_H-i-s') . '.pdf');
    }

    public function peminjamanBarangGurupdf()
    {
        $date = session('sortMonthBarangGuru');
        $peminjamanbaranggurus = PeminjamanBarangGuru::where('tanggal_pinjam', 'LIKE', '%' . $date . '%')->get();
        $pdf = 'PDF'::loadView('peminjaman_barang_guru/pdfpreview', compact('peminjamanbaranggurus'))->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_peminjaman_barang_guru_' . date('Y-m-d_H-i-s') . '.pdf');
    }

    public function peminjamanKunciSiswapdf()
    {
        $date = session('sortMonthKunciSiswa');
        $peminjamankuncisiswas = PeminjamanKunciSiswa::where('tanggal_pinjam', 'LIKE', '%' . $date . '%')->get();
        $pdf = 'PDF'::loadView('peminjaman_kunci_siswa/pdfpreview', compact('peminjamankuncisiswas'))->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_peminjaman_kunci_siswa_' . date('Y-m-d_H-i-s') . '.pdf');
    }

    public function peminjamanKunciGurupdf()
    {
        $date = session('sortMonthKunciGuru');
        $peminjamankuncigurus = PeminjamanKunciGuru::where('tanggal_pinjam', 'LIKE', '%' . $date . '%')->get();
        $pdf = 'PDF'::loadView('peminjaman_kunci_guru/pdfpreview', compact('peminjamankuncigurus'))->setPaper('a4', 'landscape');
        return $pdf->stream('laporan_peminjaman_kunci_guru_' . date('Y-m-d_H-i-s') . '.pdf');
    }
}
