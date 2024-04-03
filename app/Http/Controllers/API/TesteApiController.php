<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Transacao;
use App\Models\Banco;
use Illuminate\Support\Facades\Auth;

class TesteApiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bancos = Banco::where('user_cpf', $user->cpf)->get();

        $response = [];

        foreach ($bancos as $banco) {

            $response[] = [
                'saldo' => $banco->saldo_atual,
                'conta' => $banco->conta
            ];
        }

        return response()->json($response);
    }
}
