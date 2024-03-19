<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Banco;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DashboardTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::User();

        return view('income.dashboard', ['dados' => $user->bancos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('income.dashboard_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dados = $request->all();

        if ($request->input('add_more_parameter') == "true") {

            $dados = $request->except('_token');
            session()->push('temp', $dados);
            session()->put('temp_stored_time', time());

            return redirect()->route('dashboard.create');
        }


        $request->validate([
            'bank' => 'required',
            'description' => 'required',
            'data' => 'required|date',
            'status' => 'required',
            'amount' => 'required|numeric',
        ]);



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
