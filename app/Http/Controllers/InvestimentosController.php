<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Investimento;
use Illuminate\Http\Request;
use App\Models\Banco;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Http;

class InvestimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::User();

        $bancos = Banco::where('user_cpf', $user->cpf)->get();

        return view('menu.investimento', ['bancos'=>$bancos]);
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

        $saldo = Banco::findOrFail($request->banco)->saldo_atual;
        $data = $request->except('_token');
        $data['saldo_atual'] = $saldo;

        $data = json_encode($data);

        $response = Http::withOptions([
            'proxy' => [
                'http'  => '',
                'https' => '',
            ]
        ])->post('http://127.0.0.1:5000/laravel-requisicao', $data);


        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Investimento $investimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investimento $investimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investimento $investimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investimento $investimento)
    {
        //
    }
}
