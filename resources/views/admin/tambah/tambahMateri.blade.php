@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{ route('materi') }}" class="btn btn-outline-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h1 class="h3 mb-4 text-gray-800">Tambah Materi</h1>

        <form action="" method="POST">
            @csrf

            <!-- Judul Materi -->
            <div class="form-group">
                <label for="judul_materi">Judul Materi</label>
                <input type="text" name="judul_materi" class="form-control" required>
            </div>

            <hr>

            <!-- Detail Materi (Repeater) -->
            <div id="detail-container">
                <h5>Detail Materi</h5>

                <div class="detail-item border rounded p-3 mb-3">
                    <div class="form-group">
                        <label for="judul_detail[]">Judul Detail</label>
                        <input type="text" name="judul_detail[]" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="isi_detail[]">Isi Materi</label>
                        <textarea name="isi_detail[]" class="form-control" rows="6" required></textarea>
                    </div>

                    <button type="button" class="btn btn-danger btn-sm remove-detail">Hapus</button>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-secondary" id="add-detail">+ Tambah Detail Materi</button>
                <button type="submit" class="btn btn-primary">Simpan Materi</button>
            </div>
        </form>
    </div>

    <!-- Tambahkan JavaScript untuk clone detail -->
    <script>
        document.getElementById('add-detail').addEventListener('click', function () {
            const container = document.getElementById('detail-container');
            const item = container.querySelector('.detail-item');
            const clone = item.cloneNode(true);
            clone.querySelectorAll('input, textarea').forEach(field => field.value = '');
            container.appendChild(clone);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-detail')) {
                const items = document.querySelectorAll('.detail-item');
                if (items.length > 1) {
                    e.target.closest('.detail-item').remove();
                }
            }
        });
    </script>
@endsection