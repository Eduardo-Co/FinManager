<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class parcela_implementos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parcelas = [];

        // Loop para criar parcelas de 1 a 12x
        for ($i = 1; $i <= 12; $i++) {
            $parcelas[] = ['parcelas' => $i];
        }

        // Inserir os registros na tabela parcela_implemento
        DB::table('parcela_implementos')->insert($parcelas);
    }
}
