<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbjogos extends Model
{
    protected $fillable = [
    'Titulo',
    'descricao',
    'ano',
    'genero',
    'plataformas',
    ];
}
