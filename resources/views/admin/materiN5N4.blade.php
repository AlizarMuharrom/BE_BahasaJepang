@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Materi N5/N4</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Tombol Tambah Data -->
        <a href="{{ route('tambahMateriN5N4') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Materi
        </a>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Materi N5/N4</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Level</th>
                                <th>Detail Materi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->judul }}</td>
                                    <td>{{ $d->level->level_name ?? '-' }}</td>
                                    <td>
                                        <ul class="list-group">
                                            @foreach ($d->details as $detail)
                                                <li class="list-group-item">
                                                    <strong>{{ $detail->judul }}</strong><br>
                                                    {{ Str::limit($detail->isi, 100) }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editModal{{ $d->id }}" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <!-- Modal Edit -->
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <form action="{{ route('materiN5N4Update', $d->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $d->id }}">
                                                                Edit Materi N5/N4
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="judul">Judul Materi</label>
                                                                <input type="text" class="form-control" id="judul" name="judul"
                                                                    value="{{ $d->judul }}" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="level_id">Level</label>
                                                                <select class="form-control" id="level_id" name="level_id"
                                                                    required>
                                                                    @foreach($levels as $level)
                                                                        <option value="{{ $level->id }}" {{ $d->level_id == $level->id ? 'selected' : '' }}>
                                                                            {{ $level->level_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <h5>Detail Materi</h5>
                                                            <div id="detail-container-{{ $d->id }}">
                                                                @foreach($d->details as $index => $detail)
                                                                    <div class="detail-item border p-3 mb-3">
                                                                        <input type="hidden" name="detail_id[]"
                                                                            value="{{ $detail->id }}">
                                                                        <div class="form-group">
                                                                            <label>Judul Detail</label>
                                                                            <input type="text" class="form-control"
                                                                                name="detail_judul[]" value="{{ $detail->judul }}"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Isi Detail</label>
                                                                            <textarea class="form-control" name="detail_isi[]"
                                                                                rows="3" required>{{ $detail->isi }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan
                                                                Perubahan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Tombol Delete -->
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $d->id }}" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteModalLabel{{ $d->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('materiN5N4Delete', $d->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $d->id }}">
                                                                Konfirmasi Hapus
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin ingin menghapus materi: <strong>{{ $d->judul }}</strong>?
                                                            <p class="text-danger">Semua detail materi akan ikut terhapus!</p>
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

@push('styles')
    <style>
        .detail-item {
            position: relative;
        }

        .remove-detail {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#dataTable').DataTable();


        });
    </script>
@endpush