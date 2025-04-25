<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kanji extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function detailKanji()
    {
        return $this->hasMany(DetailKanji::class, 'kanji_id');
    }

    // Tambahkan relasi ke Level
    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }
}