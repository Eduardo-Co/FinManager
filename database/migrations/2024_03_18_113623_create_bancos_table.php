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
            $table->decimal('investimentos', 10, 2);
            $table->string('tipo_inv');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('bancos');
    }
};
