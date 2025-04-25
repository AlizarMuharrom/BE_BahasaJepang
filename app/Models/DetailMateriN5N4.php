<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailMateriN5N4 extends Model
{
    use HasFactory;

    protected $table = 'materi_n5_n4_detail'; // Sesuaikan dengan nama tabel di migrasi

    protected $fillable = [
        'materi_n5_n4_id',
        'judul',
        'isi'
    ];

    public function materi(): BelongsTo
    {
        return $this->belongsTo(MateriN5N4::class, 'materi_n5_n4_id');
    }
}