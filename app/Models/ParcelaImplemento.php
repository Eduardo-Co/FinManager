<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelaImplemento extends Model
{
    use HasFactory;

    protected $table = 'parcela_implementos';

    protected $fillable = [
        'parcelas'
    ];
}
