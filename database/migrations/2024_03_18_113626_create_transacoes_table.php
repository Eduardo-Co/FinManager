<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transacao', function (Blueprint $table) {
            $table->id('tran_id')->unique();;
            $table->integer('frequencia');
            $table->date('data');
            $table->decimal('saldo_tran', 10, 2);
            $table->string('cpf');
            $table->unsignedBigInteger('conta');


            $table->foreign('cpf')->references('cpf')->on('users')->onDelete('cascade');
            $table->foreign('conta')->references('conta')->on('bancos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transacao', function (Blueprint $table) {
            $table->dropForeign(['cpf']);
            $table->dropForeign(['conta']);
        });

        Schema::dropIfExists('transacao');
    }
};
