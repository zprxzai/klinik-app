<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Poli extends Model
{
    /** @use HasFactory<\Database\Factories\PoliFactory> */
    use HasFactory;
    use SearchableTrait;    
    protected $guard = [];
    protected $searchable = [
        'columns' => [
            'polis.nama' => 1,
        ],
        'joins' => [
            'polis' => ['polis.id','daftars.poli_id'],
        ],
    ];
}
