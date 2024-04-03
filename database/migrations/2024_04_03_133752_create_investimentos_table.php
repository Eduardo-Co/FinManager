<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investimentos', function (Blueprint $table) {
            $table->id();
            $table->decimal('investimento_mensal', 10, 2);
            $table->unsignedBigInteger('banco_conta'); // Coluna para armazenar o número da conta do banco
            $table->integer('duracao');
            $table->decimal('retorno_mensal', 5, 2);
            $table->text('descricao')->nullable();
            $table->timestamps();

            // Definindo a chave estrangeira para a tabela de bancos
            $table->foreign('banco_conta')->references('conta')->on('bancos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investimentos', function (Blueprint $table) {
            // Remove a chave estrangeira
            $table->dropForeign(['banco_conta']);
        });

        Schema::dropIfExists('investimentos');
    }
}

