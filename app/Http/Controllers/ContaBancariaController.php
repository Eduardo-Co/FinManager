<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banco;
use Illuminate\Support\Facades\Auth;

class ContaBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.contabancaria.contabancariaindex');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
        'agencia' => 'required|digits:4',
        'conta' => 'required',
        'saldo_atual' => 'required|numeric',
        'tipo_banco' => 'required',
        ];


        $messages = [
        'agencia.required' => 'O número da agência é obrigatório.',
        'agencia.digits' => 'O número da agência deve ter 4 dígitos.',
        'conta.required' => 'O número da conta é obrigatório.',
        'saldo_atual.required' => 'O saldo atual é obrigatório.',
        'saldo_atual.numeric' => 'O saldo atual deve ser um número.',
        'tipo_banco.required' => 'O nome do banco é obrigatório.',
        ];

        $user = Auth::User();
        $user_cpf = $user->cpf;

        Banco::create([
            'agencia' => $request->agencia,
            'conta' => $request->conta,
            'saldo_atual' => $request->saldo_atual,
            'tipo_banco' => $request->tipo_banco,
            'user_cpf' => $user_cpf
        ]);

        return redirect()->route('dashboard.index');
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
