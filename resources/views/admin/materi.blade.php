@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Materi</h1>

        <!-- Tombol Tambah Data -->
        <a href="{{ route('tambahMateri') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Data
        </a>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tabel Materi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Judul</th>
                                <th>Bab</th>
                                <th>Isi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Judul</th>
                                <th>Bab</th>
                                <th>Isi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->judul }}</td>
                                    <td>
                                        <ol>
                                            @foreach ($d->detail_materis as $detail)
                                                <li>{{ $detail->judul }}</li>
                                            @endforeach

                                        </ol>
                                    </td>

                                    <td>
                                        <ol>
                                            @foreach ($d->detail_materis as $detail)
                                                <li>{{ $detail->isi }}</li>
                                            @endforeach
                                        </ol>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection