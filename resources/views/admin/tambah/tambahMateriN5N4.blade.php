@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{ route('materiN5N4') }}" class="btn btn-outline-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h1 class="h3 mb-4 text-gray-800">Tambah Materi N5/N4</h1>

        <form action="{{ route('materiN5N4Store') }}" method="POST">
            @csrf

            <!-- Judul Materi -->
            <div class="form-group">
                <label for="judul_materi">Judul Materi</label>
                <input type="text" name="judul_materi" class="form-control" required>
            </div>

            <!-- Pilih Level -->
            <div class="form-group">
                <label for="level_id">Level</label>
                <select name="level_id" class="form-control" required>
                    <option value="" selected disabled>-- Pilih Level --</option>
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                    @endforeach
                </select>
            </div>

            <hr>

            <!-- Detail Materi (Repeater) -->
            <div id="detail-container">
                <h5>Detail Materi</h5>

                <div class="detail-item border rounded p-3 mb-3">
                    <div class="form-group">
                        <label>Judul Detail</label>
                        <input type="text" name="judul_detail[]" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Isi Materi</label>
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

    <!-- JavaScript untuk Menambah/Hapus Detail -->
    <script>
        document.getElementById('add-detail').addEventListener('click', function () {
            const container = document.getElementById('detail-container');
            const item = container.querySelector('.detail-item');
            const clone = item.cloneNode(true);

            // Reset nilai input pada clone
            clone.querySelectorAll('input, textarea').forEach(field => {
                field.value = '';
                field.removeAttribute('readonly');
            });

            container.appendChild(clone);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-detail')) {
                const items = document.querySelectorAll('.detail-item');
                if (items.length > 1) {
                    e.target.closest('.detail-item').remove();
                } else {
                    alert('Setidaknya harus ada satu detail materi!');
                }
            }
        });
    </script>
@endsection