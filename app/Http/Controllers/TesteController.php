<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Banco;
use Illuminate\Support\Facades\Auth;

class TesteController extends Controller
{
    public function teste()
    {

        $user = Auth::user();
        $bancos = Banco::where('user_cpf', $user->cpf)->get();
        $data = [];

        foreach ($bancos as $banco) {
            $data[] = [
                'saldo' => $banco->saldo_atual,
                'conta' => $banco->conta
            ];
        }

        $response = Http::withOptions([
            'proxy' => [
                'http'  => '',
                'https' => '',
            ]
        ])->post('http://127.0.0.1:5000/laravel-requisicao', $data);


        return $response;

    }
}
