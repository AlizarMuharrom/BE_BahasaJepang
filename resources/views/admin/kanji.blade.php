@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Kanji</h1>

        <a href="{{ route('tambahKanji') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Data
        </a>

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

        @if(session('success_adding'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success_adding') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

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
                                <th>Detail Kanji</th>
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
                                <th>Detail Kanji</th>
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
                                        @if($d->detailKanji->count() > 0)
                                            <button class="btn btn-info btn-sm view-detail" data-toggle="modal"
                                                data-target="#detailModal{{ $d->id }}">
                                                <i class="fas fa-eye"></i> Lihat Detail
                                            </button>
                                        @else
                                            <span class="text-muted">Tidak ada detail</span>
                                        @endif
                                    </td>
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

                                <!-- Detail Kanji Modal -->
                                <div class="modal fade" id="detailModal{{ $d->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="detailModalLabel{{ $d->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel{{ $d->id }}">
                                                    Detail Kanji: {{ $d->judul }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <h6>Informasi Dasar:</h6>
                                                        <p><strong>Kanji:</strong> {{ $d->judul }}</p>
                                                        <p><strong>Arti:</strong> {{ $d->nama }}</p>
                                                        <p><strong>Kunyomi:</strong> {{ $d->kunyomi }}</p>
                                                        <p><strong>Onyomi:</strong> {{ $d->onyomi }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Kategori & Level:</h6>
                                                        <p><strong>Kategori:</strong> {{ ucfirst($d->kategori) }}</p>
                                                        <p><strong>Level:</strong> {{ $d->level->level_name ?? '-' }}</p>
                                                    </div>
                                                </div>

                                                <h6>Detail Kanji:</h6>
                                                <div class="list-group">
                                                    @foreach($d->detailKanji as $detail)
                                                        <div class="list-group-item mb-2">
                                                            <div class="d-flex justify-content-between">
                                                                <h6 class="mb-1">{{ $detail->kanji }}</h6>
                                                            </div>
                                                            <p class="mb-1"><strong>Arti:</strong> {{ $detail->arti }}</p>
                                                            <p class="mb-1"><strong>Romaji:</strong> {{ $detail->romaji }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
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
                                                    <h5>Informasi Dasar Kanji</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Kanji</label>
                                                                <input type="text" name="judul" class="form-control"
                                                                    value="{{ $d->judul }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Arti</label>
                                                                <input type="text" name="nama" class="form-control"
                                                                    value="{{ $d->nama }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Kunyomi</label>
                                                                <input type="text" name="kunyomi" class="form-control"
                                                                    value="{{ $d->kunyomi }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Onyomi</label>
                                                                <input type="text" name="onyomi" class="form-control"
                                                                    value="{{ $d->onyomi }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kategori</label>
                                                        <select name="kategori" class="form-control" required>
                                                            <option value="tandoku" {{ $d->kategori == 'tandoku' ? 'selected' : '' }}>Tandoku</option>
                                                            <option value="okurigana" {{ $d->kategori == 'okurigana' ? 'selected' : '' }}>Okurigana</option>
                                                            <option value="jukugo" {{ $d->kategori == 'jukugo' ? 'selected' : '' }}>Jukugo</option>
                                                        </select>
                                                    </div>

                                                    <hr>
                                                    <h5>Detail Kanji</h5>
                                                    <div id="detail-kanji-container">
                                                        @foreach($d->detailKanji as $detail)
                                                            <div class="detail-kanji-group mb-3 p-3 border rounded">
                                                                <input type="hidden" name="detail_id[]" value="{{ $detail->id }}">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Kanji</label>
                                                                            <input type="text" name="detail_kanji[]"
                                                                                class="form-control" value="{{ $detail->kanji }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Arti</label>
                                                                            <input type="text" name="detail_arti[]"
                                                                                class="form-control" value="{{ $detail->arti }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Romaji</label>
                                                                            <input type="text" name="detail_romaji[]"
                                                                                class="form-control" value="{{ $detail->romaji }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Voice Record</label>
                                                                            <input type="text" name="detail_voice_record[]"
                                                                                class="form-control"
                                                                                value="{{ $detail->voice_record }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
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

@push('styles')
    <style>
        .view-detail {
            transition: all 0.3s ease;
        }

        .view-detail:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        audio {
            width: 200px;
        }

        .list-group-item {
            transition: background-color 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {
            // Check for success messages and show alerts
            @if(session('success_update'))
                alert('{{ session('success_update') }}');
            @endif

            @if(session('success_delete'))
                alert('{{ session('success_delete') }}');
            @endif

            @if(session('success_adding'))
                alert('{{ session('success_adding') }}');
            @endif
                });
    </script>
@endpush