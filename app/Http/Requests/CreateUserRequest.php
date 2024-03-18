<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'telefone' => 'required|string|min:10|max:15', // Requisitos básicos para um número de telefone
            'cpf' => 'required|string|size:11|unique:users'
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'O campo nome é obrigatório.',
        'email.required' => 'O campo email é obrigatório.',
        'email.email' => 'Por favor, insira um endereço de email válido.',
        'email.unique' => 'Este endereço de email já está em uso.',
        'password.required' => 'O campo senha é obrigatório.',
        'password.min' => 'A senha deve ter no mínimo :min caracteres.',
        'telefone.required' => 'O campo telefone é obrigatório.',
        'telefone.min' => 'O telefone deve ter no mínimo :min caracteres.',
        'telefone.max' => 'O telefone deve ter no máximo :max caracteres.',
        'cpf.required' => 'O campo CPF é obrigatório.',
        'cpf.size' => 'O CPF deve ter :size caracteres.',
        'cpf.unique' => 'Este CPF já está em uso.',
    ];
}
}
