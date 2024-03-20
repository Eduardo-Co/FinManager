<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Banco;
use App\Models\ParcelaImplemento;
use App\Models\Transacao;
use Illuminate\Support\Facades\Session;


class DashboardTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::User();

        $bancos = Banco::where('user_cpf', $user->cpf)->get();

        $transacoes = Transacao::get();

        return view('income.dashboard', ['bancos' => $bancos, 'transacoes' => $transacoes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::User();
        $bancos = Banco::where('user_cpf', $user->cpf)->get();
        $parcelas = ParcelaImplemento::get();

        return view('income.dashboard_add',['bancos' => $bancos, 'parcelas' => $parcelas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::User();
        $bancos = Banco::where('user_cpf', $user->cpf)->get();
        $saldo_novo = 0;

        foreach($bancos as $banco){
        }


        $dados = $request->all();

        if ($request->input('add_more_parameter') == "true") {

            $dados = $request->except('_token');
            session()->push('temp', $dados);
            session()->put('temp_stored_time', time());

            return redirect()->route('dashboard.create');

        }else{

            session()->push('temp', $dados);
            session()->put('temp_stored_time', time());

            foreach (session('temp') as $dados) {
                if ($dados['parcelas'] > 1) {

                    $status = $dados['parcelas'];

                }else{

                    switch (true) {
                        case $dados['amount'] > 0:
                            $status = 'profit';
                            break;
                        case $dados['amount'] < 0:
                            $status = 'debit';
                            break;
                        default:
                            break;
                    }
                }

                Transacao::create([
                    'conta_id' => $banco->conta,
                    'status' => $status,
                    'data' => $dados['data'],
                    'parcelas' => $dados['parcelas'],
                    'saldo_tran' => $dados['amount'],
                    'desc' => $dados['description'],
                ]);
                $saldo_novo += $dados['amount'];
            }

            foreach ($bancos as $banco) {
                $saldo_anterior = $banco->saldo_atual;
                $saldo_posterior = $saldo_novo + $saldo_anterior;

                $banco->saldo_atual = $saldo_posterior;
                
                $banco->save();
            }

            Session::forget('temp');
            Session::forget('temp_stored_time');
        }
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
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
