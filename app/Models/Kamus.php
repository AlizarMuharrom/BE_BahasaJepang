<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kamus extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'nama',
        'baca',
        'level_id',
    ];

    public function detailKamuses()
    {
        return $this->hasMany(DetailKamus::class, 'kamus_id');
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }
}