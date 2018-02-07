<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
               
               $table->increments('id');
               $table->string('logradouro');
               $table->integer('numero');
               $table->string('complemento')->nullable();
               $table->string('bairro');
               $table->string('cidade');
               $table->string('UF',2);
               $table->string('cep',8);
               
           });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
