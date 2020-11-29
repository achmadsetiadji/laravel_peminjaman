<?php

namespace App\Http\Controllers;

use App\User;
use App\Kunci;
use App\KelasRuang;
use App\PeminjamanKunciSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanKunciSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == "1") {
            $peminjamankuncisiswas = PeminjamanKunciSiswa::all();
            return view('peminjaman_kunci_siswa/index', compact('peminjamankuncisiswas'));
        } else {
            $peminjamankuncisiswas = PeminjamanKunciSiswa::where('user_id', Auth::user()->id)->get();
            return view('peminjaman_kunci_siswa/index', compact('peminjamankuncisiswas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelass = KelasRuang::all();
        $kuncis = Kunci::all();
        return view('peminjaman_kunci_siswa/create', compact('kelass', 'kuncis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nama_peminjam' => 'required',
            'nipd' => 'required|max:10',
            'kelas_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status' => 'required',
        ]);

        PeminjamanKunciSiswa::create($request->all());
        return redirect('/peminjaman_kunci_siswa')->with('status', 'Data Peminjaman Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PeminjamanKunciSiswa $peminjamanKunciSiswa)
    {
        $kelass = KelasRuang::all();
        $kuncis = Kunci::all();
        return view('peminjaman_kunci_siswa/show', compact('peminjamanKunciSiswa', 'kelass', 'kuncis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PeminjamanKunciSiswa $peminjamanKunciSiswa)
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
    public function update(Request $request, PeminjamanKunciSiswa $peminjamanKunciSiswa)
    {
        PeminjamanKunciSiswa::where('id', $peminjamanKunciSiswa->id)
            ->update([
                'status' => 'Dikembalikan',
            ]);
        return redirect('/peminjaman_kunci_siswa')->with('status', 'Kunci Telah Dikembalikan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeminjamanKunciSiswa $peminjamanKunciSiswa)
    {
        PeminjamanKunciSiswa::destroy($peminjamanKunciSiswa->id);
        return redirect('/peminjaman_kunci_siswa')->with('statusDelete', 'Data Peminjaman Berhasil Dihapus!');
    }

    public function sortByMonth(Request $request)
    {
        $date = $request->sortMonth;
        session(['sortMonthKunciSiswa' => $date]);
        $peminjamankuncisiswas = PeminjamanKunciSiswa::where('tanggal_pinjam', 'LIKE', '%' . $date . '%')->get();
        return view('peminjaman_kunci_siswa/index', compact('peminjamankuncisiswas'));
    }
}
