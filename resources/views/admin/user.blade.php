@extends('layout.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pengguna</h1>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tabel Pengguna</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->fullname }}</td>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->role }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection