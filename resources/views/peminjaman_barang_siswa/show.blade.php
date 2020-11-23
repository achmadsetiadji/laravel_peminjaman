@extends('layouts/main')

@section('title', 'Show Data Peminjaman Barang Siswa')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title text-center">Detail <b>PMBS-{{$peminjamanBarangSiswa->id}}</b></h4>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label for="gambar_barang">Gambar barang</label>
                <div class="col-md-6">
                    @foreach($peminjamanBarangSiswa->Barang as $item)
                        <img width="500" height="250" src="{{ asset('image/upload/'.$item->gambar_barang) }}" />
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                    <label for="nama_peminjam">Nama Peminjam</label>
                    <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" id="nama_peminjam"
                        placeholder="Masukan Nama Peminjam" name="nama_peminjam"
                        value="{{ $peminjamanBarangSiswa->nama_peminjam }}" disabled>
                    @error('nama_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="barang_id">Barang</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control @error('barang_id') is-invalid @enderror"
                            id="barang_id" placeholder="Masukan Barang yang ingin dipinjam" name="barang_id"
                            value="{{ old('barang_id') }}" disabled>
                            <option selected>Choose...</option>
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->id }}"
                                    @if ($barang->id === $peminjamanBarangSiswa->barang_id)
                                        selected
                                    @endif>
                                    {{ $barang->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                        @error('barang_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="mapel_id">Mapel</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control @error('mapel_id') is-invalid @enderror"
                            id="mapel_id" placeholder="Masukan Mapel" name="mapel_id"
                            value="{{ old('mapel_id') }}" disabled>
                            <option selected>Choose...</option>
                            @foreach($mapels as $mapel)
                                <option value="{{ $mapel->id }}"
                                    @if ($mapel->id === $peminjamanBarangSiswa->mapel_id)
                                        selected
                                    @endif>
                                    {{ $mapel->nama_mapel }}
                                </option>
                            @endforeach
                        </select>
                        @error('mapel_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="guru_id">Guru</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control @error('guru_id') is-invalid @enderror"
                            id="guru_id" placeholder="Masukan Guru" name="guru_id"
                            value="{{ old('guru_id') }}" disabled>
                            <option selected>Choose...</option>
                            @foreach($gurus as $guru)
                                <option value="{{ $guru->id }}"
                                    @if ($guru->id === $peminjamanBarangSiswa->guru_id)
                                        selected
                                    @endif>
                                    {{ $guru->nama_guru }}
                                </option>
                            @endforeach
                        </select>
                        @error('guru_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control @error('kelas_id') is-invalid @enderror"
                            id="kelas_id" placeholder="Masukan Guru" name="kelas_id"
                            value="{{ old('kelas_id') }}" disabled>
                            <option selected>Choose...</option>
                            @foreach($kelass as $kelas)
                                <option value="{{ $kelas->id }}"
                                    @if ($kelas->id === $peminjamanBarangSiswa->kelas_id)
                                        selected
                                    @endif>
                                    {{ $kelas->ruang_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group col-4">
                    <label for="tanggal_pinjam">Tanggal Pinjam Barang</label>
                    <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                        id="tanggal_pinjam" placeholder="Masukan Tanggal Pinjam Barang" name="tanggal_pinjam"
                        value="{{ $peminjamanBarangSiswa->tanggal_pinjam }}" disabled>
                    @error('tanggal_pinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-4">
                    <label for="tanggal_kembali">Tanggal Kembali Barang</label>
                    <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror"
                        id="tanggal_kembali" placeholder="Masukan Tanggal Kembali Barang" name="tanggal_kembali"
                        value="{{ $peminjamanBarangSiswa->tanggal_kembali }}" disabled>
                    @error('tanggal_kembali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                        placeholder="Masukan Nama Peminjam" name="status"
                        value="{{ $peminjamanBarangSiswa->status }}" disabled>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        </div>
    </div>
    <a href="/peminjaman_barang_siswa" class="text-danger float-right">
        <i class="fas fa-arrow-left"><span class="ml-2">Back</span></i>
    </a>
</div>
<!-- container-fluid -->
@endsection
