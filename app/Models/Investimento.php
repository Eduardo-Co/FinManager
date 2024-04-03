<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'investimento_mensal',
        'banco',
        'duracao',
        'retorno_mensal',
        'descricao',
    ];
}
