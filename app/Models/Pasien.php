<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;
    use SearchableTrait;
    // Zaidan
    protected $guarded = [];

    protected $searchable = [
        'columns' => [
            'pasiens.no_pasien' => 2,
            'pasiens.nama' => 1,
        ],
        'joins' => [
            'daftars' => ['pasiens.id','daftars.pasien_id'],
        ],
    ];
    public function daftar(): HasMany
    {
        return $this->hasMany(Daftar::class);
    }
}