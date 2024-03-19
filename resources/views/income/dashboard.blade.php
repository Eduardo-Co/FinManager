@extends('layouts.basico')

@section('titulo', 'Login')

@section('conteudo')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<table id="table-dashboard" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="light-mode" colspan="7">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown button
                    </button>
                    <ul class="dropdown-menu">

                        @foreach ($dados as $dado)
                        <li><a class="dropdown-item" href="#">{{$dado->tipo_banco}}</a></li>
                        @endforeach

                    </ul>
                  </div>
            </th>
        </tr>
        <tr class="light-mode">
            <th class="light-mode">Order</th>
            <th class="light-mode">Bank</th>
            <th class="light-mode">Description</th>
            <th class="light-mode">Data</th>
            <th class="light-mode">Status</th>
            <th class="light-mode">Amount</th>
            <th class="light-mode" style="text-align:center;width:100px;">Actions
                <button id="btnAdicionar" class="btn btn-primary" onclick="window.location.href='{{route('dashboard.create')}}'"><i class="fas fa-plus"></i> Add</button>
            </th>
            </th>
         </tr>
    </thead>
    <tbody>
        @foreach ($dados as $dado)
            <tr>
                <td>{{$dado->pivot->tran_id}}</td>
                <td>{{$dado->tipo_banco}}</td>
                <td>Sem Descrição</td>
                <td>{{$dado->pivot->data}}</td>
                <td>Sem status</td>
                <td>{{$dado->pivot->saldo_tran}} R$</td>
                <td>
                    <button class="edit-btn"><i class="fas fa-edit" alt="Edit icon"></i></button>
                    <button class="delete-btn"><i class="fas fa-trash-alt" alt="Delete icon"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection
