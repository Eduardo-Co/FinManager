<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function visualizar(){


        return view('register.login');
    }
    public function autenticar(Request $request){
        $regras = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $feedback = [
            'email.required' => 'O campo usuário (e-mail) é obrigatório',
            'email.email' => 'O campo usuário (e-mail) deve ser um endereço de e-mail válido',
            'password.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            return Redirect::route('dashboard.index');
        } else {

            return back()->withErrors(['email' => 'Credenciais inválidas.']);
        }
    }
    public function sair(Request $request){

        Session::flush();
        return redirect()->route('login.auth');
    }
}
