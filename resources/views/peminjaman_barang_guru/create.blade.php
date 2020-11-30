@extends('layouts/main')

@section('title', 'Tambah Data Peminjaman Barang')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Peminjaman Barang</h6>
        </div>

        <div class="card-body">
            <form class=" form-signin" action="/peminjaman_barang_guru" method="POST">
                @csrf

                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

                <div class="form-group">
                    <label for="nama_peminjam">Nama Peminjam</label>
                    <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" id="nama_peminjam"
                        placeholder="Masukan Nama Peminjam" name="nama_peminjam"
                        value="{{ Auth::user()->name }}" disabled>
                    @error('nama_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input type="hidden" id="nama_peminjam" name="nama_peminjam" value="{{ Auth::user()->name }}">
                </div>

                @if (auth()->user()->nik == null)
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            placeholder="Masukan NIK" name="nik"
                            value="{{ old('nik') }}">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @else
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            placeholder="Masukan NIK" name="nik"
                            value="{{ Auth::user()->nik }}" disabled>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <input type="hidden" id="nik" name="nik" value="{{ Auth::user()->nik }}">
                    </div>
                @endif

                <input type="hidden" id="jabatan_id" name="jabatan_id" value="{{ Auth::user()->jabatan_id }}">

                <div class="form-group">
                    <label for="barang_id">Barang</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control @error('barang_id') is-invalid @enderror"
                            id="barang_id" placeholder="Masukan Barang yang ingin dipinjam" name="barang_id"
                            value="{{ old('barang_id') }}">
                            <option selected>Choose...</option>
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->id }}">
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
                    <input type="datetime-local" class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                        id="tanggal_pinjam" placeholder="Masukan Tanggal Pinjam Barang" name="tanggal_pinjam"
                        value="{{ $date }}" disabled>
                    @error('tanggal_pinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <input type="hidden" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ $date }}">
                </div>

                <div class="form-group col-4">
                    <label for="tanggal_kembali">Tanggal Kembali Barang</label>
                    <input type="datetime-local" class="form-control @error('tanggal_kembali') is-invalid @enderror"
                        id="tanggal_kembali" placeholder="Masukan Tanggal Kembali Barang" name="tanggal_kembali"
                        value="{{ old('tanggal_kembali') }}">
                    @error('tanggal_kembali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="status" id="status" value="Dipinjam">

                <div class="form-group">
                    <button style="width: 15%;" class="btn btn-small btn-success btn-block" type="submit"><i
                            class="far fa-save"></i><span class="ml-2">save changes</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <a href="/peminjaman_barang_guru" class="text-danger float-right">
        <i class="fas fa-arrow-left"><span class="ml-2">Back</span></i>
    </a>
</div>
<!-- container-fluid -->
@endsection
