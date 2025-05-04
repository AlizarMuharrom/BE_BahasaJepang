<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';
    
    protected $fillable = ['level_name'];
    
    public function materis(): HasMany
    {
        return $this->hasMany(MateriN5N4::class, 'level_id');
    }

    // Tambahkan relasi ke Kanji
    public function kanjis(): HasMany
    {
        return $this->hasMany(Kanji::class);
    }

    public function kamuses(): HasMany
    {
        return $this->hasMany(Kamus::class);
    }
}