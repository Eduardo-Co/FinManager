@extends('income.layouts.basico')

@section('titulo', 'Login')

@section('conteudo')
    <table id="linda-tabela">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>johndoe@example.com</td>
                <td>
                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                    <button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
                </td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>janesmith@example.com</td>
                <td>
                    <button class="edit-btn"><i class="fas fa-edit"></i></button>
                    <button class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
