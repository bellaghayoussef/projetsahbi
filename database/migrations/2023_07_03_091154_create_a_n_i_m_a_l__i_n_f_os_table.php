<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateANIMALINFOsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_n_i_m_a_l__i_n_f_os', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('EXPORT_COUNTRY')->nullable();
            $table->string('ORIGIN_COUNTRY')->nullable();
            $table->string('TRANSIET_COUNTRY')->nullable();
            $table->string('ANML_SPECIES')->nullable();
            $table->string('ANML_SEX')->nullable();
            $table->string('ANML_NUMBER')->nullable();
            $table->string('ANML_USE')->nullable();
            $table->string('ANIMAL_BREED')->nullable();
            $table->integer('client_id')->unsigned()->nullable()->index();
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
        Schema::drop('a_n_i_m_a_l__i_n_f_os');
    }
}
