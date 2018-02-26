<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('user_id');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('data_nascimento',12);
            $table->string('genero');
            $table->string('naturalidade')->nullable();
            $table->string('cpf',12)->unique();
            $table->string('rg',17)->unique();
            $table->string('orgao_emissor');
            $table->string('data_de_emissao',10);
            $table->string('nome_mae');
            $table->string('nome_pai')->nullable();
            $table->integer('estado_civil_id');
            $table->integer('curso_id');
            $table->integer('endereco_id');
            $table->string('fixo',30)->nullable();
            $table->string('celular',30)->nullable();
            $table->string('email')->unique();
            $table->integer('status_aluno_id')->default(4);
            $table->float('desconto')->default(0);
            $table->integer('atividades_extra')->default(0);
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
        Schema::dropIfExists('aluno');
    }
}
