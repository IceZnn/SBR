<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
        Schema::create('times', function (Blueprint $table) {
        $table->id();
        $table->string('nome_time'); // Nome do time
        $table->json('integrantes'); // Lista de integrantes (pode ser um array em JSON)
        $table->string('nome_imagem')->nullable(); // ← ADICIONE ESTA LINHA
        $table->timestamps();
    });
}

};
