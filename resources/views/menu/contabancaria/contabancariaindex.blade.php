@extends('layouts.basico')

@section('titulo', 'Adicionar - Transação')

@section('conteudo')

<div class="transaction-form">

    <h3>Nova Conta Bancária</h3>

    <form id="transaction-form" action="{{ route('userbank.store') }}" method="POST">
        @csrf
        <div id="transaction-list"></div>
        <div class="form-group">
            <label for="bank">Agencia:</label>
            <input type="text" class="form-control" id="agencia" name="agencia" required>
            {{$errors->has('agencia') ? $errors->first('agencia') : ''}}

        </div>
        <div class="form-group">
            <label for="description">Saldo Atual:</label>
            <input type="text" class="form-control" id="saldo_atual" name="saldo_atual" required>
            {{$errors->has('saldo_atual') ? $errors->first('saldo_atual') : ''}}

        </div>
        <div class="form-group">
            <label for="text">Conta</label>
            <input type="text" class="form-control" id="conta" name="conta" required>
            {{$errors->has('conta') ? $errors->first('conta') : ''}}

        </div>
        <div class="form-group">
            <label for="status">Nome Banco:</label>
            <input type="text" class="form-control" id="tipo_banco" name="tipo_banco"  required>
            {{$errors->has('nome_banco') ? $errors->first('tipo_banco') : ''}}
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Conta</button>
    </form>


</div>

@endsection
