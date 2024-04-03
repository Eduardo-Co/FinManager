<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Investimento;
use Illuminate\Http\Request;
use App\Models\Banco;
use App\Models\User;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
