<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Peminjaman Kunci Guru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

    <!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Data Peminjaman Kunci Guru</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">No.</th>
                            <th scope="col" class="text-center">Kode Peminjaman</th>
                            <th scope="col" class="text-center">Nama Peminjam</th>
                            <th scope="col" class="text-center">NIK</th>
                            <th scope="col" class="text-center">Jabatan</th>
                            <th scope="col" class="text-center">Kunci</th>
                            <th scope="col" class="text-center">Tanggal Pinjam</th>
                            <th scope="col" class="text-center">Tanggal Kembali</th>
                            <th scope="col" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjamankuncigurus as $peminjamanKunciGuru)
                            <tr>
                                <th scope="row" class="text-center"><strong>{{ $loop->iteration }}</strong></th>
                                <td class="text-center">PMKG-{{ $peminjamanKunciGuru->id }}</td>
                                <td class="text-center">{{ $peminjamanKunciGuru->nama_peminjam }}</td>
                                <td class="text-center">{{ $peminjamanKunciGuru->nik }}</td>
                                <td class="text-center">
                                    @foreach($peminjamanKunciGuru->Jabatan as $item)
                                        {{ $item->nama_jabatan }}
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @foreach($peminjamanKunciGuru->Kunci as $item)
                                        {{ $item->nama_kunci }}
                                    @endforeach
                                </td>
                                <td class="text-center">{{ $peminjamanKunciGuru->tanggal_pinjam }}</td>
                                <td class="text-center">{{ $peminjamanKunciGuru->tanggal_kembali }}</td>
                                <td class="text-center">
                                    @if($peminjamanKunciGuru->status == 'Dipinjam')
                                        Dipinjam
                                    @else
                                        Dikembalikan
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</body>
</html>

