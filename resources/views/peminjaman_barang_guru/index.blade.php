@extends('layouts/main')

@section('title', 'Tabel Peminjaman Barang Guru')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Peminjaman Barang Guru</h1>
        @if (auth()->user()->role_id == "1")
            <form class="form-inline">
                <a href="{{ url('/peminjamanBarangGuruexcel') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">
                    <i class="fas fa-file-excel fa-md text-white-50"></i><span class="ml-2">Generate Excel</span>
                </a>
                <a href="{{ url('/peminjamanBarangGurupdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-file-pdf fa-md text-white-50"></i><span class="ml-2">Generate PDF</span>
                </a>
            </form>
        @endif
    </div>

    <!-- Flash Data -->
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('statusDelete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('statusDelete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/peminjaman_barang_guru/create" class="text-primary">
                <i class="fas fa-plus"><span class="ml-2">Tambah Peminjaman Barang Guru</span></i>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @if (auth()->user()->role_id == "1")
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No.</th>
                                <th scope="col" class="text-center">Kode Peminjaman</th>
                                <th scope="col" class="text-center">Nama Peminjam</th>
                                <th scope="col" class="text-center">NIK</th>
                                <th scope="col" class="text-center">Jabatan</th>
                                <th scope="col" class="text-center">Barang</th>
                                <th scope="col" class="text-center">Tanggal Pinjam</th>
                                <th scope="col" class="text-center">Tanggal Kembali</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjamanbaranggurus as $peminjamanBarangGuru)
                                <tr>
                                    <th scope="row" class="text-center"><strong>{{ $loop->iteration }}</strong></th>
                                    <td class="text-center">
                                        <a href="{{ route('peminjaman_barang_guru.show', $peminjamanBarangGuru->id) }}">
                                            PMBG-{{ $peminjamanBarangGuru->id }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $peminjamanBarangGuru->nama_peminjam }}</td>
                                    <td class="text-center">{{ $peminjamanBarangGuru->nik }}</td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangGuru->Jabatan as $item)
                                            {{ $item->nama_jabatan }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangGuru->Barang as $item)
                                            {{ $item->nama_barang }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ $peminjamanBarangGuru->tanggal_pinjam }}</td>
                                    <td class="text-center">{{ $peminjamanBarangGuru->tanggal_kembali }}</td>
                                    <td class="text-center">
                                        @if($peminjamanBarangGuru->status == 'Dipinjam')
                                            <span class="badge badge-pill badge-warning">Dipinjam</span>
                                        @else
                                            <span class="badge badge-pill badge-success">Dikembalikan</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form action="/peminjaman_barang_guru/{{ $peminjamanBarangGuru->id }}"
                                            method="POST" class="d-inline">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-small text-success">
                                                <i class=" fa fa-check-circle">Dikembalikan</i>
                                            </button>
                                        </form>
                                        <form action="/peminjaman_barang_guru/{{ $peminjamanBarangGuru->id }}"
                                            method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-small text-danger">
                                                <i class=" fa fa-trash"></i><span class="ml-2">Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No.</th>
                                <th scope="col" class="text-center">Kode Peminjaman</th>
                                <th scope="col" class="text-center">Nama Peminjam</th>
                                <th scope="col" class="text-center">NIK</th>
                                <th scope="col" class="text-center">Jabatan</th>
                                <th scope="col" class="text-center">Barang</th>
                                <th scope="col" class="text-center">Tanggal Pinjam</th>
                                <th scope="col" class="text-center">Tanggal Kembali</th>
                                <th scope="col" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjamanbaranggurus as $peminjamanBarangGuru)
                                <tr>
                                    <th scope="row" class="text-center"><strong>{{ $loop->iteration }}</strong></th>
                                    <td class="text-center">
                                        <a href="{{ route('peminjaman_barang_guru.show', $peminjamanBarangGuru->id) }}">
                                            PMBG-{{ $peminjamanBarangGuru->id }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $peminjamanBarangGuru->nama_peminjam }}</td>
                                    <td class="text-center">{{ $peminjamanBarangGuru->nik }}</td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangGuru->Jabatan as $item)
                                            {{ $item->nama_jabatan }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangGuru->Barang as $item)
                                            {{ $item->nama_barang }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ $peminjamanBarangGuru->tanggal_pinjam }}</td>
                                    <td class="text-center">{{ $peminjamanBarangGuru->tanggal_kembali }}</td>
                                    <td class="text-center">
                                        @if($peminjamanBarangGuru->status == 'Dipinjam')
                                            <span class="badge badge-pill badge-warning">Dipinjam</span>
                                        @else
                                            <span class="badge badge-pill badge-success">Dikembalikan</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection