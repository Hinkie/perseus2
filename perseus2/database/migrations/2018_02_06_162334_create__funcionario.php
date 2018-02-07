<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('role_id')->default(3);
            $table->string('nome');
            $table->string('sobrenome');
            $table->integer('endereco_id');
            $table->string('telefone1',30);
            $table->string('telefone2',30)->nullable();
            $table->string('email')->unique();
            $table->integer('funcao_id');
            $table->string('cpf',11)->unique();
            $table->string('rg',15)->unique();
            $table->string('orgao_emissor');
            $table->string('nome_mae');
            $table->string('nome_pai')->nullable();
            $table->integer('estado_civil_id');
            $table->integer('status_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
