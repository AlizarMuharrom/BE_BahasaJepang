@php
use Illuminate\Support\Str;
@endphp

@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Ujian</h1>

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
        <a href="{{ route('tambahUjian') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Data
        </a>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tabel Ujian</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Level</th>
                                <th>Jumlah Soal</th>
                                <th>Detail Soal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->judul }}</td>
                                    <td>
                                        @switch($d->level_id)
                                            @case(1) Pemula @break
                                            @case(2) N5 @break
                                            @case(3) N4 @break
                                            @default Unknown
                                        @endswitch
                                    </td>
                                    <td>{{ $d->jumlah_soal }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-toggle="modal" 
                                                data-target="#detailModal{{ $d->id }}">
                                            <i class="fas fa-eye"></i> Lihat Soal
                                        </button>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Semua modal ditempatkan di luar tabel -->
    @foreach ($data as $d)
        <!-- Modal Detail Soal -->
        <div class="modal fade" id="detailModal{{ $d->id }}" tabindex="-1" role="dialog"
             aria-labelledby="detailModalLabel{{ $d->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $d->id }}">
                            Detail Soal - {{ $d->judul }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Soal</th>
                                        <th>Pilihan Jawaban</th>
                                        <th>Jawaban Benar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($d->questions as $index => $question)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $question->soal }}</td>
                                        <td>
                                            <ul class="list-unstyled">
                                                @foreach(json_decode($question->pilihan_jawaban, true) as $key => $value)
                                                <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="text-success font-weight-bold">{{ $question->jawaban_benar }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit (diperbarui) -->
        <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" role="dialog"
             aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{ route('ujianUpdate', $d->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $d->id }}">Edit Data Ujian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Judul Ujian</label>
                                <input type="text" name="judul" class="form-control"
                                    value="{{ $d->judul }}" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Soal</label>
                                        <input type="number" name="jumlah_soal" class="form-control"
                                            value="{{ $d->jumlah_soal }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level_id" class="form-control" required>
                                            <option value="1" {{ $d->level_id == 1 ? 'selected' : '' }}>Pemula</option>
                                            <option value="2" {{ $d->level_id == 2 ? 'selected' : '' }}>N5</option>
                                            <option value="3" {{ $d->level_id == 3 ? 'selected' : '' }}>N4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5>Edit Soal</h5>
                            <div class="questions-container" style="max-height: 400px; overflow-y: auto;">
                                @foreach($d->questions as $index => $question)
                                <div class="card mb-3 question-item">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Soal {{ $index + 1 }}</label>
                                            <textarea name="questions[{{ $question->id }}][soal]" 
                                                class="form-control" rows="2" required>{{ $question->soal }}</textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Pilihan Jawaban</label>
                                            @foreach(json_decode($question->pilihan_jawaban, true) as $key => $value)
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">{{ $key }}</span>
                                                </div>
                                                <input type="text" 
                                                    name="questions[{{ $question->id }}][pilihan][{{ $key }}]" 
                                                    class="form-control" value="{{ $value }}" required>
                                            </div>
                                            @endforeach
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Jawaban Benar</label>
                                            <select name="questions[{{ $question->id }}][jawaban_benar]" 
                                                class="form-control" required>
                                                @foreach(json_decode($question->pilihan_jawaban, true) as $key => $value)
                                                <option value="{{ $key }}" {{ $question->jawaban_benar == $key ? 'selected' : '' }}>
                                                    {{ $key }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Semua Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Delete -->
        <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalLabel{{ $d->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('ujianDelete', $d->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $d->id }}">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Yakin ingin menghapus data ujian <strong>{{ $d->judul }}</strong>?
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
@endsection

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