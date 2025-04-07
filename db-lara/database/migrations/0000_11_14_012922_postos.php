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
        Schema::create('postos', function (Blueprint $table) {
            $table->increments('id_posto');
            $table->string('local_cidade', 100);
            $table->string('numero_tel_posto', 30);
            $table->string('local_estado', 45);
            $table->string('cep', 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postos');
    }
};
