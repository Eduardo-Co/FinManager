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
                    'conta_id' => $dados['bank'],
                    'status' => $status,
                    'data' => $dados['data'],
                    'parcelas' => $dados['parcelas'],
                    'saldo_tran' => $dados['amount'],
                    'desc' => $dados['description'],
                ]);
                $saldo_novo += $dados['amount'];
            }
            foreach ($bancos as $banco) {
                if($banco->conta == $dados['bank']){
                    $saldo_anterior = $banco->saldo_atual;
                    $saldo_posterior = $saldo_novo + $saldo_anterior;
                    $banco->saldo_atual = $saldo_posterior;
                    $banco->save();
                }
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
        $transacao = Transacao::findOrFail($id);
        $parcelas = ParcelaImplemento::get();

        return view('income.editdashboard', ['transacao' => $transacao, 'parcelas' => $parcelas]);
    }





    public function update(Request $request, string $id)
    {

        $transacao = Transacao::findOrFail($id);
        $user = Auth::user();
        $bancos = Banco::where('user_cpf', $user->cpf)->get();
        $saldo_novo = 0;


        if ($user->id != $transacao->user_id) {
            return redirect()->back()->with('error', 'Você não tem permissão para editar esta transação.');
        }

        if ($request->has('parcelas') && $request->parcelas > 1) {
            $status = $request->parcelas;
        } else {

            switch (true) {
                case $request->amount > 0:
                    $status = 'profit';
                    break;
                case $request->amount < 0:
                    $status = 'debit';
                    break;
                default:
                    $status = 'neutro';
                    break;
            }
        }
        $saldo_novo = $request->amount - $transacao->saldo_tran;
        $transacao->status = $status;
        $transacao->desc = $request->description;
        $transacao->data = $request->data;
        $transacao->parcelas = $request->parcelas;
        $transacao->saldo_tran = $request->amount;
        $transacao->conta_id = $request->bank;

        $transacao->save();

        foreach ($bancos as $banco) {
            if($banco->conta == $request->bank){
                $saldo_anterior = $banco->saldo_atual;
                $saldo_posterior = $saldo_novo + $saldo_anterior;
                $banco->saldo_atual = $saldo_posterior;
                $banco->save();
            }
        }

        return redirect()->route('dashboard.index')->with('success', 'Transação atualizada com sucesso.');
    }



    public function destroy(string $id)
    {
        $verify = Transacao::where('tran_id', $id)->first();
        $account = Banco::where('conta', $verify->conta_id)->first();
        $user = Auth::user();

        if ($user->cpf == $account->user_cpf) {

            $verify->delete();

            return redirect()->route('dashboard.index');
        }
    }

}
