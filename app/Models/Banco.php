<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Banco extends Model
{
    protected $primaryKey = 'conta';

    use HasFactory;
    protected $fillable = [
        'agencia',
        'saldo_atual',
        'conta',
        'tipo_banco',
        'user_cpf'
    ];

    public function transacoes()
    {
        return $this->hasMany(Transacao::class, 'conta_id', 'conta');
    }
    public function usuarios(){

        return $this->belongsTo(User::class, 'user_cpf', 'cpf');
    }
}
