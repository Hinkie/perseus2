<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
            Schema::create('telefones', function (Blueprint $table) {
                   
                   $table->increments('id');
                   $table->string('local');
                   $table->string('numero',12)->nullable();
                   $table->integer('ramal')->nullable();
                               
        }); 
        }


        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('telefones');
        }
    }

