@extends('layouts.basico')

@section('titulo', 'Adicionar - Investimento')

@section('conteudo')

<div class="transaction-form">

    <h3>Simular Investimento</h3>

    <form id="transaction-form" action="{{ route('investimentos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="investimento_mensal">Investimento Mensal (R$):</label>
            <input type="text" class="form-control" id="monthly_investment" name="investimento_mensal" required>
            {{$errors->has('investimento_mensal') ? $errors->first('investimento_mensal') : ''}}
        </div>
        <div class="form-group">
            <label for="banco">Conta Bancária:</label>
            <select class="form-control" id="bank_account" name="banco" required>
                <option value="">Selecione a conta bancária</option>

                @foreach ($bancos as $banco)
                    <option value="{{ $banco->conta }}">{{ $banco->conta }} - {{ $banco->tipo_banco }}</option>
                @endforeach

            </select>
            {{$errors->has('banco') ? $errors->first('banco') : ''}}
        </div>
        <div class="form-group">
            <label for="duracao">Duração do Investimento (em meses):</label>
            <input type="number" class="form-control" id="duracao" name="duracao" required>
            {{$errors->has('duration') ? $errors->first('duration') : ''}}
        </div>
        <div class="form-group">
            <label for="retorno_mensal">Taxa de Retorno Mensal (%):</label>
            <input type="number" class="form-control" id="retorno_mensal" name="retorno_mensal" required>
            {{$errors->has('retorno_mensal') ? $errors->first('retorno_mensal') : ''}}
        </div>
        <div class="form-group">
            <label for="description">Descrição do Investimento:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Investimento</button>
    </form>

</div>

@endsection
