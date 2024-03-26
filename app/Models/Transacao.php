<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Banco;

class Transacao extends Model
{
    use HasFactory;
    protected $primaryKey = 'tran_id';
    protected $table = 'transacoes';
    protected $fillable = [
        'frequencia',
        'status',
        'data',
        'saldo_tran',
        'cpf',
        'conta_id',
        'parcelas',
        'desc'
    ];


    public function banco()
    {
        return $this->belongsTo(Banco::class, 'conta_id', 'conta');
    }
}
