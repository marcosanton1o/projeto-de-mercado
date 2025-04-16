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
        Schema::create('lembrete', function (Blueprint $table) {
            $table->id('id_lembrete');
            $table->string('cliente');
            $table->string('estado');
            $table->string('cidade');
            $table->unsignedBigInteger('distância');
            $table->unsignedBigInteger('preco');
            $table->time('horario');
            $table->date('data');
            $table->unsignedBigInteger('user_lembrete');
            $table->timestamps();

            $table->foreign('user_lembrete')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembrete');
    }
};
