@extends('layouts.registro')

@section('titulo', 'Login')

@section('conteudo')

<div class="login">
    <form action="{{route('login.auth')}}" method="POST">
        @csrf

        <h2>Login</h2>
        {{$errors->first('erro')}}
        <input type="email" id="login" placeholder="Usuário" name="email" required>
        {{$errors->has('email') ? $errors->first('email') : ''}}

        <input type="password" id="password" placeholder="Senha" name="password" required>
        {{$errors->has('password') ? $errors->first('password') : ''}}

        <div class="password-line">
            <label class="checkbox-label"><input type="checkbox" name="remember"> Remember Me</label>
            <a href="#">Forgot Password?</a>
        </div>

        <button type="submit">Login</button>

        <div class="register-line">
            <p>Don't have an account?</p> <a href="{{route('register.index')}}">Register</a>
        </div>

        <input type="checkbox" class="sr-only" id="darkmode-toggle">
        <label for="darkmode-toggle" class="toggle">
            <span>Toggle dark mode</span>
        </label>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkbox = document.querySelector('#darkmode-toggle');
        if (checkbox) {
            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    document.body.classList.add('dark-mode');

                } else {
                    document.body.classList.remove('dark-mode');

                }
            });
        }
    });
</script>

@endsection
