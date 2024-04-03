<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste()
    {
        // Caminho para o arquivo Python
        $pythonScript = base_path('C:\Users\eduardo.cardozo\Documents\Codes\FinManager-main\api_analise\python.py');

        // Executa o script Python
        exec("python3 {$pythonScript}");

        return 'oi';
    }
}
