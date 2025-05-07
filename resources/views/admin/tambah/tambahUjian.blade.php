@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('kamus') }}" class="btn btn-outline-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h2 class="mb-4">Tambah Ujian</h2>

        <form action="" method="POST">
            @csrf

            <!-- Pilih Level -->
            <div class="form-group">
                <label for="level_id">Level Ujian</label>
                <select name="level_id" class="form-control" required>
                    <option value="" selected disabled>-- Pilih Level --</option>
                    <option value="pemula">Pemula</option>
                    <option value="n5">N5</option>
                    <option value="n4">N4</option>
                </select>
            </div>

            <!-- Judul Ujian -->
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Ujian</label>
                <input type="text" name="judul" class="form-control" id="judul" required>
            </div>

            <!-- Jumlah Soal -->
            <div class="mb-3">
                <label for="jumlah_soal" class="form-label">Jumlah Soal</label>
                <input type="number" name="jumlah_soal" class="form-control" id="jumlah_soal" required>
            </div>

            <hr>
            <h5 class="mt-4">Detail Soal</h5>

            <!-- Template untuk soal, bisa diduplikasi via JavaScript nantinya -->
            <div id="soal-container">
                <div class="soal-item border rounded p-3 mb-3">
                    <div class="mb-2">
                        <label class="form-label">Pertanyaan</label>
                        <input type="text" name="soal[0][pertanyaan]" class="form-control" required>
                    </div>
                    <div class="row">
                        @foreach (['A', 'B', 'C', 'D'] as $opt)
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Pilihan {{ $opt }}</label>
                                <input type="text" name="soal[0][pilihan][{{ $opt }}]" class="form-control" required>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="level_id">Jawaban Benar</label>
                        <select name="level_id" class="form-control" required>
                            <option value="" selected disabled>-- Pilih Jawaban Benar --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <!-- <div class="mb-2">
                                <label class="form-label">Jawaban Benar</label>
                                <select name="soal[0][jawaban]" class="form-select" required>
                                    <option value="" selected disabled>-- Pilih Jawaban Benar --</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div> -->
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-secondary" id="add-detail">+ Tambah Soal</button>
                <button type="submit" class="btn btn-primary">Simpan Ujian</button>
            </div>
        </form>
    </div>

    <!-- Script Tambah Soal -->
    <script>
        let soalIndex = 1;

        document.getElementById('tambah-soal').addEventListener('click', function () {
            const container = document.getElementById('soal-container');

            const soalHTML = `
                                                    <div class="soal-item border rounded p-3 mb-3">
                                                        <div class="mb-2">
                                                            <label class="form-label">Pertanyaan</label>
                                                            <input type="text" name="soal[${soalIndex}][pertanyaan]" class="form-control" required>
                                                        </div>
                                                        <div class="row">
                                                            ${['A', 'B', 'C', 'D'].map(opt => `
                                                                <div class="col-md-6 mb-2">
                                                                    <label class="form-label">Pilihan ${opt}</label>
                                                                    <input type="text" name="soal[${soalIndex}][pilihan][${opt}]" class="form-control" required>
                                                                </div>
                                                            `).join('')}
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="form-label">Jawaban Benar</label>
                                                            <select name="soal[${soalIndex}][jawaban]" class="form-select" required>
                                                                <option value="">-- Pilih Jawaban Benar --</option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="C">C</option>
                                                                <option value="D">D</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    `;

            container.insertAdjacentHTML('beforeend', soalHTML);
            soalIndex++;
        });
    </script>
@endsection