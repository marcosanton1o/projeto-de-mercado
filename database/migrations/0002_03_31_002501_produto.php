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
        Schema::create('produto', function (Blueprint $table) {

            $table->id('id_produto');
            $table->string('nome_prod', 45);
            $table->string('marca', 45);
            $table->date('data_validade');
            $table->decimal('preco');


            $table->timestamps();
        });

    }


    public function down()

    {

        Schema::dropIfExists('produto');

    }
};
