@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Data Kamus</h1>

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

        <a href="{{ route('tambahKamus') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
        <!-- Rest of your content -->

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
                                <th>Level</th>
                                <th>Detail Kamus</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kanji</th>
                                <th>Arti</th>
                                <th>Furigana</th>
                                <th>Level</th>
                                <th>Detail Kamus</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $d->judul }}</td>
                                                <td>{{ $d->nama }}</td>
                                                <td>{{ $d->baca }}</td>
                                                <td>{{ $d->level->level_name ?? '-' }}</td>
                                                <td>
                                                    @if($d->detailKamuses->count() > 0)
                                                        <button class="btn btn-info btn-sm lihat-detail" data-toggle="modal"
                                                            data-target="#detailModal{{ $d->id }}">
                                                            <i class="fas fa-eye"></i> Lihat Detail
                                                        </button>
                                                    @else
                                                        <span class="text-muted">Tidak ada detail</span>
                                                    @endif
                                                </td>
                                                <td>
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

                                            <!-- Modal Detail Kamus -->
                                            <div class="modal fade" id="detailModal{{ $d->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="detailModalLabel{{ $d->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="detailModalLabel{{ $d->id }}">
                                                                Detail Kamus: {{ $d->judul }}
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
                                                                    <p><strong>Furigana:</strong> {{ $d->baca }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h6>Level:</h6>
                                                                    <p><strong>Level:</strong> {{ $d->level->level_name ?? '-' }}</p>
                                                                </div>
                                                            </div>

                                                            <h6>Detail Kalimat Kamus:</h6>
                                                            <div class="list-group">
                                                                @foreach($d->detailKamuses as $detail)
                                                                    <div class="list-group-item mb-2">
                                                                        <div class="d-flex justify-content-between">
                                                                            <h6 class="mb-1">{{ $detail->kanji }}</h6>
                                                                        </div>
                                                                        <p class="mb-1"><strong>Arti:</strong> {{ $detail->arti }}</p>
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
                                                    <form action="{{ route('kamusUpdate', $d->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class=" modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $d->id }}">Edit Data Kamus</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Informasi Dasar Kamus</h5>
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
                                                                        <label>Furigana</label>
                                                                        <input type="text" name="baca" class="form-control"
                                                                            value="{{ $d->baca }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Level</label>
                                                                        <select name="level_id" class="form-control" required>
                                                                            @foreach($levels as $level)
                                                                                <option value="{{ $level->id }}" {{ $d->level_id == $level->id ? 'selected' : '' }}>
                                                                                    {{ $level->level_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <h5>Detail Kamus</h5>
                                                            <div id="detail-kamus-container">
                                                                @foreach($d->detailKamuses as $index => $detail)
                                                                    <div class="detail-kamus-group mb-3 p-3 border rounded">
                                                                        <input type="hidden" name="detail_id[]" value="{{ $detail->id }}">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Kalimat Kanji</label>
                                                                                    <input type="text" name="detail_kanji[]"
                                                                                        class="form-control" value="{{ $detail->kanji }}"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Arti Kalimat</label>
                                                                                    <input type="text" name="detail_arti[]" class="form-control"
                                                                                        value="{{ $detail->arti }}" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Voice Record</label>
                                                                            <input type="file" name="detail_voice[]" class="form-control-file">
                                                                            @if($detail->voice_record)
                                                                                <small class="text-muted">Rekaman saat ini:
                                                                                    {{ basename($detail->voice_record) }}</small>
                                                                                <input type="hidden" name="existing_voice[]"
                                                                                    value="{{ $detail->voice_record }}">
                                                                            @endif
                                                                        </div>
                                                                        <button type="button" class="btn btn-sm btn-danger remove-detail-btn"
                                                                            data-detail-id="{{ $detail->id }}">
                                                                            <i class="fas fa-trash"></i> Hapus Detail
                                                                        </button>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <button type="button" id="add-detail-btn" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-plus"></i> Tambah Detail
                                                            </button>
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
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
        .lihat-detail {
            transition: all 0.3s ease;
        }

        .lihat-detail:hover {
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

        .badge {
            font-size: 0.8rem;
            vertical-align: middle;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {

            @if(session('success_adding'))
                alert('{{ session('success_adding') }}');
            @endif
            
            @if(session('success_update'))
                alert('{{ session('success_update') }}');
            @endif
            
            @if(session('success_delete'))
                alert('{{ session('success_delete') }}');
            @endif
            // Tambah detail kamus
            $('#add-detail-btn').click(function () {
                const newDetail = `
                                        <div class="detail-kamus-group mb-3 p-3 border rounded">
                                            <input type="hidden" name="detail_id[]" value="new">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Kalimat Kanji</label>
                                                        <input type="text" name="detail_kanji[]" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Arti Kalimat</label>
                                                        <input type="text" name="detail_arti[]" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Voice Record</label>
                                                <input type="file" name="detail_voice[]" class="form-control-file">
                                            </div>
                                            <button type="button" class="btn btn-sm btn-danger remove-detail-btn">
                                                <i class="fas fa-trash"></i> Hapus Detail
                                            </button>
                                        </div>
                                    `;
                $('#detail-kamus-container').append(newDetail);
            });

            // Hapus detail kamus
            $(document).on('click', '.remove-detail-btn', function () {
                const detailId = $(this).data('detail-id');
                if (detailId) {
                    if (confirm('Yakin ingin menghapus detail ini?')) {
                        $(this).closest('.detail-kamus-group').remove();
                    }
                } else {
                    $(this).closest('.detail-kamus-group').remove();
                }
            });

            // Putar audio saat modal dibuka
            $('.modal').on('shown.bs.modal', function () {
                $(this).find('audio').each(function () {
                    this.play();
                });
            });

            // Hentikan audio saat modal ditutup
            $('.modal').on('hidden.bs.modal', function () {
                $(this).find('audio').each(function () {
                    this.pause();
                    this.currentTime = 0;
                });
            });
        });
    </script>
@endpush