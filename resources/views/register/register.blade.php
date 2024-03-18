@extends('layouts.registro')

@section('titulo', 'Register')

@section('conteudo')

<div class="login">
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <h2>Register</h2>
        <input type="name" id="name" placeholder="Nome" name="name" required>
        {{$errors->has('name') ? $errors->first('name') : ''}}

        <input autocomplete="off" type="email" id="login" placeholder="Usuário" name="email" required>
        {{$errors->has('email') ? $errors->first('email') : ''}}

        <input autocomplete="off" type="password" id="password" placeholder="Senha" name="password" required>
        {{$errors->has('password') ? $errors->first('password') : ''}}

        <input type="add" id="cpf" placeholder="CPF" name="cpf" required>
        {{$errors->has('cpf') ? $errors->first('cpf') : ''}}

        <input type="add" id="telefone" placeholder="Telefone" name="telefone" required>
        {{$errors->has('telefone') ? $errors->first('telefone') : ''}}

        <button type="submit">Cadastrar</button>

        <div class="register-line">
            <p>Already have an account?</p> <a href="{{route('login')}}">Login</a>
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
