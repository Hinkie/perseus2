<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendario extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendario', function(Blueprint $table)
        {
            $table->integer('id')->primary();
            $table->date('db_date')->unique('td_dbdate_idx');
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
            $table->integer('week');
            $table->string('day_name', 9);
            $table->string('month_name', 9);
            $table->char('feriado_flag', 1)->nullable()->default('f');
            $table->char('dia_letivo_flag', 1)->nullable()->default('f');
            $table->char('fds_flag', 1)->nullable()->default('f');
            $table->unique(['year','month','day'], 'td_ymd_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('calendario');
    }

}
