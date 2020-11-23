@extends('layouts/main')

@section('title', 'Show Data Peminjaman Kunci Siswa')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title text-center">Detail <b>PMKS-{{$peminjamanKunciSiswa->id}}</b></h4>
        </div>

        <div class="card-body">
            <div class="form-group">
                    <label for="nama_peminjam">Nama Peminjam</label>
                    <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" id="nama_peminjam"
                        placeholder="Masukan Nama Peminjam" name="nama_peminjam"
                        value="{{ $peminjamanKunciSiswa->nama_peminjam }}" disabled>
                    @error('nama_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                                    @if ($kunci->id === $peminjamanKunciSiswa->kunci_id)
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

                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control @error('kelas_id') is-invalid @enderror"
                            id="kelas_id" placeholder="Masukan Guru" name="kelas_id"
                            value="{{ old('kelas_id') }}" disabled>
                            <option selected>Choose...</option>
                            @foreach($kelass as $kelas)
                                <option value="{{ $kelas->id }}"
                                    @if ($kelas->id === $peminjamanKunciSiswa->kelas_id)
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
                    <label for="tanggal_pinjam">Tanggal Pinjam Kunci</label>
                    <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                        id="tanggal_pinjam" placeholder="Masukan Tanggal Pinjam Kunci" name="tanggal_pinjam"
                        value="{{ $peminjamanKunciSiswa->tanggal_pinjam }}" disabled>
                    @error('tanggal_pinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-4">
                    <label for="tanggal_kembali">Tanggal Kembali Kunci</label>
                    <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror"
                        id="tanggal_kembali" placeholder="Masukan Tanggal Kembali Kunci" name="tanggal_kembali"
                        value="{{ $peminjamanKunciSiswa->tanggal_kembali }}" disabled>
                    @error('tanggal_kembali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                        placeholder="Masukan Nama Peminjam" name="status"
                        value="{{ $peminjamanKunciSiswa->status }}" disabled>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        </div>
    </div>
    <a href="/peminjaman_kunci_siswa" class="text-danger float-right">
        <i class="fas fa-arrow-left"><span class="ml-2">Back</span></i>
    </a>
</div>
<!-- container-fluid -->
@endsection
