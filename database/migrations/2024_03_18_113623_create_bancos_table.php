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
        Schema::create('bancos', function (Blueprint $table) {

            $table->string('agencia');
            $table->decimal('saldo_atual', 10, 2);
            $table->unsignedBigInteger('conta')->unique();
            $table->string('tipo_banco');
            $table->timestamps();
            $table->string('user_cpf');
            $table->foreign('user_cpf')->references('cpf')->on('users')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::table('bancos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('bancos');
    }
};
