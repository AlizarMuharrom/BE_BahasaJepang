@extends('layout.app')

@section('content')
    <div class="container">
        <a href="{{ route('kamus') }}" class="btn btn-outline-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h3 class="mb-4">Tambah Data Kamus</h3>

        <form action="{{ route('kamusStore') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="judul">Kanji</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nama">Arti</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="baca">Cara Baca</label>
                <input type="text" name="baca" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="level_id">Level</label>
                <select name="level_id" class="form-control" required>
                    <option value="" selected disabled>-- Pilih Level --</option>
                    <option value="N5">N5</option>
                    <option value="N4">N4</option>
                </select>
            </div>

            <hr>
            <h5>Detail Kalimat Kamus</h5>

            <div id="detail-kamus-container">
                <div class="detail-kamus border p-3 mb-3 rounded">
                    <div class="form-group">
                        <label>Kalimat Kanji</label>
                        <input type="text" name="detail_kanji[]" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Arti Kalimat</label>
                        <input type="text" name="detail_arti[]" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Voice Record</label>
                        <input type="file" name="detail_voice[]" class="form-control-file" accept="audio/*" required>
                    </div>

                    <button type="button" class="btn btn-danger btn-sm remove-detail">Hapus</button>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-secondary" id="add-detail">+ Tambah Detail Kamus</button>
                <button type="submit" class="btn btn-primary">Simpan Kamus</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-detail').addEventListener('click', function () {
            const container = document.getElementById('detail-kamus-container');
            const firstDetail = container.querySelector('.detail-kamus');
            const clone = firstDetail.cloneNode(true);

            // Reset value input
            clone.querySelectorAll('input').forEach(input => input.value = '');
            container.appendChild(clone);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-detail')) {
                const allDetails = document.querySelectorAll('.detail-kamus');
                if (allDetails.length > 1) {
                    e.target.closest('.detail-kamus').remove();
                }
            }
        });
    </script>
@endsection