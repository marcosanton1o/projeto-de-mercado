<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()

    {

        Schema::create('registro_corrida', function (Blueprint $table) {

            $table->id('id_registro_corrida');
            $table->dateTime('data');
            $table->decimal('preco', 10, 2);
            $table->unsignedBigInteger('corrida_user')->nullable();
            $table->string('nome_cliente', 150);

            $table->foreign('corrida_user')->references('id')->on('users');
            $table->timestamps();

        });

    }


    public function down()

    {

        Schema::dropIfExists('registro_corrida');

    }

};
