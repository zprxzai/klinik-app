<?php

namespace App\Models;

use App\Models\Daftar;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Poli extends Model
{
    use HasFactory;
    use SearchableTrait;

    protected $fillable = ['nama', 'biaya'];
    protected $searchable = [
        'columns' => [
            'polis.nama' => 1,
        ],
        'joins' => [
            'daftars' => ['polis.id','daftars.poli_id'],
        ],
    ];

    public function daftar()
    {
        return $this->hasOne(Daftar::class);
    }
}