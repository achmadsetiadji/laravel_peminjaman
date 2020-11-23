@extends('layouts/main')

@section('title', 'Show Data Peminjaman Barang Guru')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title text-center">Detail <b>PMBG-{{$peminjamanBarangGuru->id}}</b></h4>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label for="gambar_barang">Gambar barang</label>
                <div class="col-md-6">
                    @foreach($peminjamanBarangGuru->Barang as $item)
                        <img width="500" height="250" src="{{ asset('image/upload/'.$item->gambar_barang) }}" />
                    @endforeach
                </div>
            </div>

                <div class="form-group">
                    <label for="nama_peminjam">Nama Peminjam</label>
                    <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" id="nama_peminjam"
                        placeholder="Masukan Nama Peminjam" name="nama_peminjam"
                        value="{{ $peminjamanBarangGuru->nama_peminjam }}" disabled>
                    @error('nama_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nik">NIK Peminjam</label>
                    <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                        placeholder="Masukan Nama Peminjam" name="nik"
                        value="{{ $peminjamanBarangGuru->nik }}" disabled>
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan_id">Jabatan Peminjam</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control @error('jabatan_id') is-invalid @enderror"
                            id="jabatan_id" placeholder="Masukan Jabatan Peminjam" name="jabatan_id"
                            value="{{ old('jabatan_id') }}" disabled>
                            @foreach($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}"
                                    @if ($jabatan->id === $peminjamanBarangGuru->jabatan_id)
                                        selected
                                    @endif>
                                    {{ $jabatan->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jabatan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
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
                                    @if ($barang->id === $peminjamanBarangGuru->barang_id)
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

                <div class="form-group col-4">
                    <label for="tanggal_pinjam">Tanggal Pinjam Barang</label>
                    <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                        id="tanggal_pinjam" placeholder="Masukan Tanggal Pinjam Barang" name="tanggal_pinjam"
                        value="{{ $peminjamanBarangGuru->tanggal_pinjam }}" disabled>
                    @error('tanggal_pinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-4">
                    <label for="tanggal_kembali">Tanggal Kembali Barang</label>
                    <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror"
                        id="tanggal_kembali" placeholder="Masukan Tanggal Kembali Barang" name="tanggal_kembali"
                        value="{{ $peminjamanBarangGuru->tanggal_kembali }}" disabled>
                    @error('tanggal_kembali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                        placeholder="Masukan Nama Peminjam" name="status"
                        value="{{ $peminjamanBarangGuru->status }}" disabled>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        </div>
    </div>
    <a href="/peminjaman_barang_guru" class="text-danger float-right">
        <i class="fas fa-arrow-left"><span class="ml-2">Back</span></i>
    </a>
</div>
<!-- container-fluid -->
@endsection
