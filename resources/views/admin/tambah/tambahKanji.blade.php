@extends('layout.app')

@section('content')
    <div class="container">
        <a href="{{ route('kanji') }}" class="btn btn-outline-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h3 class="mb-4">Tambah Data Kanji</h3>

        <form action="{{ route('kanjiStore') }}" method="POST" enctype="multipart/form-data">
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
                <label for="kunyomi">Kunyomi</label>
                <input type="text" name="kunyomi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="onyomi">Onyomi</label>
                <input type="text" name="onyomi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="voice_record">Voice Record (Utama)</label>
                <input type="file" name="voice_record" class="form-control-file" accept="audio/*" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="" selected disabled>-- Pilih Kategori --</option>
                    <option value="tandoku">Tandoku</option>
                    <option value="okurigana">Okurigana</option>
                    <option value="jukugo">Jukugo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="level_id">Level</label>
                <select name="level_id" class="form-control" required>
                    <option value="" selected disabled>-- Pilih Level --</option>
                    <option value="1">N5</option>
                    <option value="2">N4</option>
                </select>
            </div>

            <hr>
            <h5>Detail Kanji</h5>

            <div id="detail-kanji-container">
                <div class="detail-kanji border p-3 mb-3 rounded">
                    <div class="form-group">
                        <label>Kanji</label>
                        <input type="text" name="detail_kanji[]" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Romaji</label>
                        <input type="text" name="detail_romaji[]" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Arti</label>
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
                <button type="button" class="btn btn-secondary" id="add-detail">+ Tambah Detail Kanji</button>
                <button type="submit" class="btn btn-primary">Simpan Kanji</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-detail').addEventListener('click', function () {
            const container = document.getElementById('detail-kanji-container');
            const firstDetail = container.querySelector('.detail-kanji');
            const clone = firstDetail.cloneNode(true);

            // Kosongkan input
            clone.querySelectorAll('input').forEach(input => input.value = '');
            container.appendChild(clone);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-detail')) {
                const allDetails = document.querySelectorAll('.detail-kanji');
                if (allDetails.length > 1) {
                    e.target.closest('.detail-kanji').remove();
                }
            }
        });
    </script>
@endsection