@extends('layouts.basico')

@section('titulo', 'Editar - Transação')

@section('conteudo')

<div class="transaction-form">

    <h3>Editar Transação</h3>



    <form id="transaction-form" action="{{ route('dashboard.update', $transacao->tran_id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div id="transaction-list"></div>
        <div class="form-group">
            <label for="bank">Bank:</label>
            <select class="form-control" id="bank" name="bank" required>
                <option value="{{ $transacao->banco['conta'] }}">{{ $transacao->banco['tipo_banco'] }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $description ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="data">Date:</label>
            <input type="date" class="form-control" id="data" name="data" value="{{ $data ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="status">Parcelas:</label>
            <select class="form-control" id="parcelas" name="parcelas" required>
                @foreach ($parcelas as $parcela)
                    <option value="{{ $parcela->parcelas }}">{{ $parcela->parcelas}}x</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $amount ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Transaction</button>
    </form>



</div>

@endsection
