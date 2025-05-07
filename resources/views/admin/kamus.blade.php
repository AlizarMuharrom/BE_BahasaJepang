@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Kamus</h1>

        <!-- Tombol Tambah Data -->
        <a href="{{ route('tambahKamus') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Data
        </a>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tabel Kamus</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Kanji</th>
                                <th>Arti</th>
                                <th>Furigana</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Kanji</th>
                                <th>Arti</th>
                                <th>Furigana</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->judul }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->baca }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection