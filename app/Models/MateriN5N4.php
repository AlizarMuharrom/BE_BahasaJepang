<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MateriN5N4 extends Model
{
    use HasFactory;

    protected $table = 'materi_n5_n4s';

    protected $fillable = ['judul', 'level_id'];

    public function details(): HasMany
    {
        return $this->hasMany(DetailMateriN5N4::class, 'materi_n5_n4_id');
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }
}