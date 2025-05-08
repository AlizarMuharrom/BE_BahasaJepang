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
                                <th>Kanji</th>
                                <th>Arti</th>
                                <th>Furigana</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kanji</th>
                                <th>Arti</th>
                                <th>Furigana</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->judul }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->baca }}</td>
                                    <td>
                                        <!-- Tombol Aksi -->
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editModal{{ $d->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $d->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('kamusUpdate', $d->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $d->id }}">Edit Data Kamus</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Kanji</label>
                                                        <input type="text" name="judul" class="form-control"
                                                            value="{{ old('judul', $d->judul) }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Arti</label>
                                                        <input type="text" name="nama" class="form-control"
                                                            value="{{ old('nama', $d->nama) }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cara Baca</label>
                                                        <input type="text" name="baca" class="form-control"
                                                            value="{{ old('baca', $d->baca) }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select name="level_id" class="form-control" required>
                                                            <option value="N5" {{ $d->level_id == 'N5' ? 'selected' : '' }}>N5
                                                            </option>
                                                            <option value="N4" {{ $d->level_id == 'N4' ? 'selected' : '' }}>N4
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel{{ $d->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('kamusDelete', $d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $d->id }}">Konfirmasi Hapus
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus data kamus <strong>{{ $d->judul }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection