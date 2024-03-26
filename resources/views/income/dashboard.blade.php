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
                      Bancos
                    </button>
                    <ul class="dropdown-menu">
                        @if(isset($bancos))
                            @foreach ($bancos as $dado)
                            <li><a class="dropdown-item" href="#">{{$dado->tipo_banco}}</a></li>
                            @endforeach
                        @endif
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

        @foreach ($transacoes as  $dado)
                <tr>
                    <td>{{$dado->tran_id}}</td>
                    <td>{{$dado->banco->tipo_banco}}</td>
                    <td>{{$dado->desc}}</td>
                    <td>{{$dado->data}}</td>
                    <td class="@if($dado->status == 'profit') profit @elseif($dado->status == 'debit') debit @else orange @endif">
                        <span>{{$dado->status}}@if($dado->status != 'profit' && $dado->status != 'debit')x @endif </span></td>
                    <td>{{$dado->saldo_tran}} R$</td>
                    <td>
                        <a href='{{route("dashboard.edit",$dado->tran_id)}}' class="edit-btn"><i class="fas fa-edit" alt="Edit icon"></i></a>
                        <a href='{{ route("dashboard.destroy", $dado->tran_id) }}' class="delete-btn"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $dado->tran_id }}').submit();">
                             <i class="fas fa-trash-alt" alt="Delete icon"></i>
                         </a>

                         <form id="delete-form-{{ $dado->tran_id }}" action="{{ route('dashboard.destroy', $dado->tran_id) }}" method="POST" style="display: none;">
                             @csrf
                             @method('DELETE')
                         </form>

                    </td>
                </tr>
            @endforeach

    </tbody>
</table>



@endsection
