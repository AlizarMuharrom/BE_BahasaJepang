@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Materi</h1>
        <button id="createMateriBtn" class="btn btn-primary">Tambah Materi</button>
    </div>

    <div class="alert alert-success d-none" id="successAlert"></div>
    <div class="alert alert-danger d-none" id="errorAlert"></div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="materiTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Materi</th>
                            <th>Jumlah Sub Materi</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan diisi via JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create/Edit -->
<div class="modal fade" id="materiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Materi Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="materiForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="materiId">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Materi*</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                        <div class="invalid-feedback">Judul materi wajib diisi</div>
                    </div>

                    <div id="detail-container">
                        <!-- Detail materi akan diisi di sini -->
                    </div>

                    <button type="button" id="addDetailBtn" class="btn btn-secondary mb-3">
                        <i class="fas fa-plus"></i> Tambah Sub Materi
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Template untuk detail materi (hidden) -->
<div id="detail-template" class="d-none">
    <div class="detail-item card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-light">
            <h5 class="detail-title mb-0">Sub Materi</h5>
            <button type="button" class="btn btn-sm btn-danger remove-detail">
                <i class="fas fa-trash"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Judul Sub Materi*</label>
                <input type="text" class="form-control detail-judul" required>
                <div class="invalid-feedback">Judul sub materi wajib diisi</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Isi Sub Materi*</label>
                <textarea class="form-control detail-isi" rows="5" required></textarea>
                <div class="invalid-feedback">Isi sub materi wajib diisi</div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .detail-item {
        transition: all 0.3s ease;
        border: 1px solid #dee2e6;
    }
    .detail-item:hover {
        border-color: #0d6efd;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    .modal-lg {
        max-width: 800px;
    }
    .cursor-pointer {
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Load data materi
    function loadMateri() {
        $.ajax({
            url: '/api/materi',
            method: 'GET',
            success: function(response) {
                const tbody = $('#materiTable tbody');
                tbody.empty();
                
                response.forEach((materi, index) => {
                    const createdAt = new Date(materi.created_at);
                    const formattedDate = createdAt.toLocaleDateString('id-ID', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    
                    tbody.append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${materi.judul}</td>
                            <td>${materi.detail_materis.length}</td>
                            <td>${formattedDate}</td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-btn me-1" data-id="${materi.id}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="${materi.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function(xhr) {
                showError(xhr.responseJSON?.message || 'Gagal memuat data materi');
            }
        });
    }

    // Show modal for create
    $('#createMateriBtn').click(function() {
        $('#modalTitle').text('Tambah Materi Baru');
        $('#materiForm')[0].reset();
        $('#materiId').val('');
        $('#detail-container').empty();
        $('#judul').removeClass('is-invalid');
        addDetailItem(); // Tambahkan satu detail item default
        $('#materiModal').modal('show');
    });

    // Add detail item
    $('#addDetailBtn').click(function() {
        addDetailItem();
        // Scroll ke detail terakhir
        $('html, body').animate({
            scrollTop: $('#detail-container').children().last().offset().top
        }, 500);
    });
    
    function addDetailItem(detail = null) {
        const container = $('#detail-container');
        const index = container.children().length;
        const template = $('#detail-template').html();
        
        let $newItem = $(template);
        $newItem.find('.detail-title').text(`Sub Materi ${index + 1}`);
        
        if (detail) {
            $newItem.find('.detail-judul').val(detail.judul);
            $newItem.find('.detail-isi').val(detail.isi);
        }
        
        container.append($newItem);
    }

    // Remove detail item
    $(document).on('click', '.remove-detail', function() {
        if ($('#detail-container .detail-item').length > 1) {
            $(this).closest('.detail-item').remove();
            // Reindex remaining items
            $('#detail-container .detail-item').each(function(index) {
                $(this).find('.detail-title').text(`Sub Materi ${index + 1}`);
            });
        } else {
            showError('Setidaknya harus ada satu sub materi');
        }
    });

    // Handle form submission
    $('#materiForm').submit(function(e) {
        e.preventDefault();
        
        // Reset validation
        $('.is-invalid').removeClass('is-invalid');
        let isValid = true;
        
        // Validate main form
        if (!$('#judul').val()) {
            $('#judul').addClass('is-invalid');
            isValid = false;
        }
        
        // Validate detail items
        const detailItems = [];
        $('.detail-item').each(function(index) {
            const $judul = $(this).find('.detail-judul');
            const $isi = $(this).find('.detail-isi');
            
            if (!$judul.val()) {
                $judul.addClass('is-invalid');
                isValid = false;
            }
            
            if (!$isi.val()) {
                $isi.addClass('is-invalid');
                isValid = false;
            }
            
            detailItems.push({
                judul: $judul.val(),
                isi: $isi.val()
            });
        });
        
        if (!isValid) {
            showError('Harap isi semua field yang wajib diisi');
            return;
        }
        
        const formData = {
            judul: $('#judul').val(),
            detail_materis: detailItems
        };
        
        const materiId = $('#materiId').val();
        const url = materiId ? `/api/materi/${materiId}` : '/api/materi';
        const method = materiId ? 'PUT' : 'POST';
        
        $.ajax({
            url: url,
            method: method,
            data: JSON.stringify(formData),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#materiModal').modal('hide');
                showSuccess(materiId ? 'Materi berhasil diperbarui' : 'Materi berhasil ditambahkan');
                loadMateri();
            },
            error: function(xhr) {
                showError(xhr.responseJSON?.message || 'Terjadi kesalahan');
            }
        });
    });

    // Edit button handler
    $(document).on('click', '.edit-btn', function() {
        const materiId = $(this).data('id');
        
        $.ajax({
            url: `/api/materi/${materiId}`,
            method: 'GET',
            success: function(response) {
                $('#modalTitle').text('Edit Materi');
                $('#materiId').val(response.id);
                $('#judul').val(response.judul).removeClass('is-invalid');
                $('#detail-container').empty();
                
                response.detail_materis.forEach(detail => {
                    addDetailItem(detail);
                });
                
                $('#materiModal').modal('show');
            },
            error: function(xhr) {
                showError(xhr.responseJSON?.message || 'Gagal memuat data materi');
            }
        });
    });

    // Delete button handler
    $(document).on('click', '.delete-btn', function() {
        const materiId = $(this).data('id');
        const materiJudul = $(this).closest('tr').find('td:eq(1)').text();
        
        Swal.fire({
            title: 'Hapus Materi?',
            html: `Anda yakin ingin menghapus materi <strong>${materiJudul}</strong>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/api/materi/${materiId}`,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function() {
                        showSuccess('Materi berhasil dihapus');
                        loadMateri();
                    },
                    error: function(xhr) {
                        showError(xhr.responseJSON?.message || 'Gagal menghapus materi');
                    }
                });
            }
        });
    });

    // Show success message
    function showSuccess(message) {
        const alert = $('#successAlert');
        alert.html(`<i class="fas fa-check-circle me-2"></i> ${message}`).removeClass('d-none');
        setTimeout(() => alert.addClass('d-none'), 5000);
    }

    // Show error message
    function showError(message) {
        const alert = $('#errorAlert');
        alert.html(`<i class="fas fa-exclamation-circle me-2"></i> ${message}`).removeClass('d-none');
        setTimeout(() => alert.addClass('d-none'), 5000);
    }

    // Initial load
    loadMateri();
});
</script>
@endpush