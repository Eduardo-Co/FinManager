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
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id('tran_id')->unique();
            $table->string('status');
            $table->integer('parcelas');
            $table->date('data');
            $table->decimal('saldo_tran', 10, 2);
            $table->unsignedBigInteger('conta_id');
            $table->string('desc');
            $table->timestamps();

            $table->foreign('conta_id')->references('conta')->on('bancos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transacao', function (Blueprint $table) {
            $table->dropForeign(['conta_id']);
        });

        Schema::dropIfExists('transacoes');
    }
};
