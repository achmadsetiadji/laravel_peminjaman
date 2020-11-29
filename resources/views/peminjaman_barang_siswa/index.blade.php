@extends('layouts/main')

@section('title', 'Tabel Peminjaman Barang Siswa')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Peminjaman Barang Siswa</h1>
        @if (auth()->user()->role_id == "1")
            <form class="form-inline">
                <a href="{{ url('/peminjamanBarangSiswaexcel') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2">
                    <i class="fas fa-file-excel fa-md text-white-50"></i><span class="ml-2">Generate Excel</span>
                </a>
                <a href="{{ url('/peminjamanBarangSiswapdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
            <div class="row">
                <div class="col-md-7">
                    <a href="/peminjaman_barang_siswa/create" class="text-primary">
                        <i class="fas fa-plus"><span class="ml-2">Tambah Peminjaman Barang Siswa</span></i>
                    </a>
                </div>
                <div class="col-md-5">
                    @if (auth()->user()->role_id == "1")
                    <div class="col-lg-8">
                        <form class="form-inline" method="GET" action="peminjaman_barang_siswa_sort">
                            <div class="form-group">
                                <label for="sort_month" class="mr-2">Sort by Month:</label>
                                <input type="month" name="sortMonth" class="form-control mr-3">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
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
                                <th scope="col" class="text-center">NIPD</th>
                                <th scope="col" class="text-center">Barang</th>
                                <th scope="col" class="text-center">Guru</th>
                                <th scope="col" class="text-center">Mapel</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">Tanggal Pinjam</th>
                                <th scope="col" class="text-center">Tanggal Kembali</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjamanbarangsiswas as $peminjamanBarangSiswa)
                                <tr>
                                    <th scope="row" class="text-center"><strong>{{ $loop->iteration }}</strong></th>
                                    <td class="text-center">
                                        <a href="{{ route('peminjaman_barang_siswa.show', $peminjamanBarangSiswa->id) }}">
                                            PMBS-{{ $peminjamanBarangSiswa->id }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $peminjamanBarangSiswa->nama_peminjam }}</td>
                                    <td class="text-center">{{ $peminjamanBarangSiswa->nipd }}</td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangSiswa->Barang as $item)
                                            {{ $item->nama_barang }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangSiswa->Guru as $item)
                                            {{ $item->nama_guru }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangSiswa->Mapel as $item)
                                            {{ $item->nama_mapel }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangSiswa->Kelas as $item)
                                            {{ $item->ruang_kelas }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ $peminjamanBarangSiswa->tanggal_pinjam }}</td>
                                    <td class="text-center">{{ $peminjamanBarangSiswa->tanggal_kembali }}</td>
                                    <td class="text-center">
                                        @if($peminjamanBarangSiswa->status == 'Dipinjam')
                                            <span class="badge badge-pill badge-warning">Dipinjam</span>
                                        @else
                                            <span class="badge badge-pill badge-success">Dikembalikan</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form action="/peminjaman_barang_siswa/{{ $peminjamanBarangSiswa->id }}"
                                            method="POST" class="d-inline">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-small text-success">
                                                <i class=" fa fa-check-circle">Dikembalikan</i>
                                            </button>
                                        </form>
                                        <form action="/peminjaman_barang_siswa/{{ $peminjamanBarangSiswa->id }}"
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
                                <th scope="col" class="text-center">NIPD</th>
                                <th scope="col" class="text-center">Barang</th>
                                <th scope="col" class="text-center">Guru</th>
                                <th scope="col" class="text-center">Mapel</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">Tanggal Pinjam</th>
                                <th scope="col" class="text-center">Tanggal Kembali</th>
                                <th scope="col" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjamanbarangsiswas as $peminjamanBarangSiswa)
                                <tr>
                                    <th scope="row" class="text-center"><strong>{{ $loop->iteration }}</strong></th>
                                    <td class="text-center">
                                        <a href="{{ route('peminjaman_barang_siswa.show', $peminjamanBarangSiswa->id) }}">
                                            PMBS-{{ $peminjamanBarangSiswa->id }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $peminjamanBarangSiswa->nama_peminjam }}</td>
                                    <td class="text-center">{{ $peminjamanBarangSiswa->nipd }}</td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangSiswa->Barang as $item)
                                            {{ $item->nama_barang }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangSiswa->Guru as $item)
                                            {{ $item->nama_guru }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangSiswa->Mapel as $item)
                                            {{ $item->nama_mapel }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @foreach($peminjamanBarangSiswa->Kelas as $item)
                                            {{ $item->ruang_kelas }}
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ $peminjamanBarangSiswa->tanggal_pinjam }}</td>
                                    <td class="text-center">{{ $peminjamanBarangSiswa->tanggal_kembali }}</td>
                                    <td class="text-center">
                                        @if($peminjamanBarangSiswa->status == 'Dipinjam')
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
