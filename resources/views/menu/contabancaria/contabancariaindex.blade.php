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
        </div>
        <div class="form-group">
            <label for="description">Saldo Atual:</label>
            <input type="text" class="form-control" id="saldo_atual" name="saldo_atual" required>
        </div>
        <div class="form-group">
            <label for="text">Conta</label>
            <input type="text" class="form-control" id="conta" name="conta" required>
        </div>
        <div class="form-group">
            <label for="status">Nome Banco:</label>
            <input type="text" class="form-control" id="status" name="status"  required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Conta</button>
    </form>


</div>

@endsection
