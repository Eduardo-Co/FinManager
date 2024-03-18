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
        'tipo_inv',
    ];


    public function usuarios()
    {
        return $this->belongsToMany('App\Models\User', 'transacao', 'conta', 'cpf')
                ->withPivot(['tran_id', 'frequencia', 'data', 'saldo_tran']);
    }
}
