@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Materi</h1>

        @if(session('success_adding'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success_adding') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('success_update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success_update') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('success_delete'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success_delete') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Tombol Tambah Data -->
        <a href="{{ route('tambahMateri') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
        <!-- Rest of your content -->

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
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Bab</th>
                                <th>Isi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
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
                                                <li>{{ Str::limit($detail->isi, 50) }}</li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#editModal{{ $d->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('materiUpdate', $d->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $d->id }}">
                                                                Edit Materi
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="judul">Judul Materi</label>
                                                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $d->judul }}" required>
                                                            </div>
                                                            
                                                            @foreach($d->detail_materis as $index => $detail)
                                                            <div class="form-group">
                                                                <label for="detail_judul_{{ $index }}">Judul Bab {{ $index + 1 }}</label>
                                                                <input type="text" class="form-control" id="detail_judul_{{ $index }}" 
                                                                    name="detail_judul[{{ $detail->id }}]" value="{{ $detail->judul }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="detail_isi_{{ $index }}">Isi Bab {{ $index + 1 }}</label>
                                                                <textarea class="form-control" id="detail_isi_{{ $index }}" 
                                                                    name="detail_isi[{{ $detail->id }}]" rows="3" required>{{ $detail->isi }}</textarea>
                                                            </div>
                                                            @endforeach
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

                                        <!-- Tombol Delete -->
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $d->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteModalLabel{{ $d->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('materiDelete', $d->id) }}" method="POST">
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

@push('scripts')
    <script>
        $(document).ready(function () {
            // Check for success messages and show alerts
            @if(session('success_adding'))
                alert('{{ session('success_adding') }}');
            @endif
            
            @if(session('success_update'))
                alert('{{ session('success_update') }}');
            @endif
            
            @if(session('success_delete'))
                alert('{{ session('success_delete') }}');
            @endif
        });
    </script>
@endpush