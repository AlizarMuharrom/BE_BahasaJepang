<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MateriN5N4 extends Model
{
    use HasFactory;

    protected $fillable = ['judul'];

    /**
     * Get all of the details for the MateriN5N4
     */
    public function details(): HasMany
    {
        return $this->hasMany(DetailMateriN5N4::class);
    }
}