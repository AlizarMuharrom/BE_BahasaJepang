@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Kanji</h1>

        <a href="{{ route('tambahKanji') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Data
        </a>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tabel Kanji</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Kanji</th>
                                <th>Arti</th>
                                <th>Kunyomi</th>
                                <th>Onyomi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kategori</th>
                                <th>Kanji</th>
                                <th>Arti</th>
                                <th>Kunyomi</th>
                                <th>Onyomi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->kategori }}</td>
                                    <td>{{ $d->judul }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->kunyomi }}</td>
                                    <td>{{ $d->onyomi }}</td>
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

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('kanjiUpdate', $d->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $d->id }}">Edit Data Kanji</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form isi ulang -->
                                                    <div class="form-group">
                                                        <label>Kanji</label>
                                                        <input type="text" name="judul" class="form-control"
                                                            value="{{ $d->judul }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Arti</label>
                                                        <input type="text" name="nama" class="form-control"
                                                            value="{{ $d->nama }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kunyomi</label>
                                                        <input type="text" name="kunyomi" class="form-control"
                                                            value="{{ $d->kunyomi }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Onyomi</label>
                                                        <input type="text" name="onyomi" class="form-control"
                                                            value="{{ $d->onyomi }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kategori</label>
                                                        <select name="kategori" class="form-control" required>
                                                            <option value="tandoku" {{ $d->kategori == 'tandoku' ? 'selected' : '' }}>Tandoku</option>
                                                            <option value="okurigana" {{ $d->kategori == 'okurigana' ? 'selected' : '' }}>Okurigana</option>
                                                            <option value="jukugo" {{ $d->kategori == 'jukugo' ? 'selected' : '' }}>Jukugo</option>
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

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel{{ $d->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('kanjiDelete', $d->id) }}" method="POST">
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
                                                    Yakin ingin menghapus data kanji <strong>{{ $d->judul }}</strong>?
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