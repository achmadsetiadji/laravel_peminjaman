@extends('layouts/main')

@section('title', 'Show Data Peminjaman Kunci Guru')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title text-center">Detail <b>PMKG-{{$peminjamanKunciGuru->id}}</b></h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" id="nama_peminjam"
                    placeholder="Masukan Nama Peminjam" name="nama_peminjam"
                    value="{{ $peminjamanKunciGuru->nama_peminjam }}" disabled>
                @error('nama_peminjam')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nik">NIK Peminjam</label>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                    placeholder="Masukan Nama Peminjam" name="nik"
                    value="{{ $peminjamanKunciGuru->nik }}" disabled>
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
                                @if ($jabatan->id === $peminjamanKunciGuru->jabatan_id)
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
                <label for="kunci_id">Kunci</label>
                <div class="input-group mb-3">
                    <select class="custom-select form-control @error('kunci_id') is-invalid @enderror"
                        id="kunci_id" placeholder="Masukan Kunci yang ingin dipinjam" name="kunci_id"
                        value="{{ old('kunci_id') }}" disabled>
                        <option selected>Choose...</option>
                        @foreach($kuncis as $kunci)
                            <option value="{{ $kunci->id }}"
                                @if ($kunci->id === $peminjamanKunciGuru->kunci_id)
                                    selected
                                @endif>
                                {{ $kunci->nama_kunci }}
                            </option>
                        @endforeach
                    </select>
                    @error('kunci_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-4">
                <label for="tanggal_pinjam">Tanggal Pinjam Kunci</label>
                <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                    id="tanggal_pinjam" placeholder="Masukan Tanggal Pinjam Kunci" name="tanggal_pinjam"
                    value="{{ $peminjamanKunciGuru->tanggal_pinjam }}" disabled>
                @error('tanggal_pinjam')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label for="tanggal_kembali">Tanggal Kembali Kunci</label>
                <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror"
                    id="tanggal_kembali" placeholder="Masukan Tanggal Kembali Kunci" name="tanggal_kembali"
                    value="{{ $peminjamanKunciGuru->tanggal_kembali }}" disabled>
                @error('tanggal_kembali')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                    placeholder="Masukan Nama Peminjam" name="status"
                    value="{{ $peminjamanKunciGuru->status }}" disabled>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <a href="/peminjaman_kunci_guru" class="text-danger float-right">
        <i class="fas fa-arrow-left"><span class="ml-2">Back</span></i>
    </a>
</div>
<!-- container-fluid -->
@endsection
