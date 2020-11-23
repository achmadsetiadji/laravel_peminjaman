<?php

namespace App\Http\Controllers;

use App\User;
use App\Barang;
use App\Jabatan;
use App\PeminjamanBarangGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanBarangGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == "1") {
            $peminjamanbaranggurus = PeminjamanBarangGuru::all();
            return view('peminjaman_barang_guru/index', compact('peminjamanbaranggurus'));
        } else {
            $peminjamanbaranggurus = PeminjamanBarangGuru::where('user_id', Auth::user()->id)->get();
            return view('peminjaman_barang_guru/index', compact('peminjamanbaranggurus'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        $jabatans = Jabatan::all();
        return view('peminjaman_barang_guru/create', compact('barangs', 'jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PeminjamanBarangGuru $peminjamanBarangGuru)
    {        $request->validate([
            'user_id' => 'required',
            'nama_peminjam' => 'required',
            'nik' => 'required|max:16',
            'jabatan_id' => 'required',
            'barang_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status' => 'required',
        ]);

        PeminjamanBarangGuru::create($request->all());
        return redirect('/peminjaman_barang_guru')->with('status', 'Data Peminjaman Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PeminjamanBarangGuru $peminjamanBarangGuru)
    {
        $barangs = Barang::all();
        $jabatans = Jabatan::all();
        return view('peminjaman_barang_guru/show', compact('peminjamanBarangGuru', 'barangs', 'jabatans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PeminjamanBarangGuru $peminjamanBarangGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeminjamanBarangGuru $peminjamanBarangGuru)
    {
        PeminjamanBarangGuru::where('id', $peminjamanBarangGuru->id)
            ->update([
                'status' => 'Dikembalikan',
            ]);
        return redirect('/peminjaman_barang_guru')->with('status', 'Barang Telah Dikembalikan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeminjamanBarangGuru $peminjamanBarangGuru)
    {
        PeminjamanBarangGuru::destroy($peminjamanBarangGuru->id);
        return redirect('/peminjaman_barang_guru')->with('statusDelete', 'Data Peminjaman Berhasil Dihapus!');
    }
}
