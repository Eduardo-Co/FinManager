@extends('layouts.basico')

@section('titulo', 'Adicionar - Transação')

@section('conteudo')



<div class="transaction-form">
    @if(session('temp'))
    <div class="temp-section">
        <h3>Transações Adicionas:</h3>
        <table class="temp-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAmount = 0; // Variável para calcular a soma dos amounts
                @endphp
                @foreach(session('temp') as $temp)
                    <tr class="temp-item">
                        @if($temp['description'])
                            <td>{{$temp['description']}}</td>
                        @endif
                        @if($temp['amount'])
                            <td>{{$temp['amount']}} R$</td>
                            @php
                                $totalAmount += $temp['amount']; // Adiciona o amount atual ao total
                            @endphp
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total-amount">
            <strong class="{{ $totalAmount >= 0 ? 'positive' : 'negative' }}">
                {{$totalAmount}} R$
            </strong>
        </div>
    </div>
@endif

    <h3>Nova transação</h3>

    <form id="transaction-form" action="{{ route('dashboard.store') }}" method="POST">
        @csrf
        <div id="transaction-list"></div>
        <div class="form-group">
            <label for="bank">Bank:</label>
            <input type="text" class="form-control" id="bank" name="bank" value="{{ $bank ?? '' }}" required>
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
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $status ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $amount ?? '' }}" required>
            <!-- Campo oculto para indicar que o usuário clicou em "Adicionar mais um parâmetro" -->
            <input type="hidden" id="add-more-parameter" name="add_more_parameter" value="false">
            <a href="#" id="add-parameter-link">Adicionar mais uma transação</a>
        </div>
        <button type="submit" class="btn btn-primary">Add Transaction</button>
    </form>


</div>

    <script>
        document.getElementById('add-parameter-link').addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir o comportamento padrão do link
            document.getElementById('add-more-parameter').value = "true"; // Definir o valor do campo oculto para true
            document.getElementById('transaction-form').submit(); // Submeter o formulário
        });
    </script>

@endsection
