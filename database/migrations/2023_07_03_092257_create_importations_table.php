<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id')->unsigned()->nullable()->index();
            $table->string('CER_TYPE')->nullable();
            $table->string('CER_LANG')->nullable();
            $table->string('COMP_ID')->nullable();
            $table->string('EUSER_QID')->nullable();
            $table->string('EXP_NAME')->nullable();
            $table->string('EXP_TEL')->nullable();
            $table->string('EXP_QID')->nullable();
            $table->string('EXP_FAX')->nullable();
            $table->string('EXP_COUNTRY')->nullable();
            $table->string('IMP_NAME')->nullable();
            $table->string('IMP_ADDRESS')->nullable();
            $table->string('IMP_FAX')->nullable();
            $table->string('IMP_TEL')->nullable();
            $table->string('IMP_POBOX')->nullable();
            $table->string('IMP_COUNTRY')->nullable();
            $table->string('ORIGIN_COUNTRY')->nullable();
            $table->string('SHIPPING_PLACE')->nullable();
            $table->string('ENTERY_PORT')->nullable();
            $table->string('EXPECTED_ARRIVAL_DATE')->nullable();
            $table->string('TRANSPORT')->nullable();
            $table->string('SHIPPING_DATE')->nullable();
            $table->string('APPLICANT_NAME')->nullable();
            $table->string('APPLICANT_TEL')->nullable();
            $table->string('EXP_NATIONALITY')->nullable();
            $table->string('EXP_PASSPORT_NUM')->nullable();
            $table->string('accepted')->nullable();
            $table->string('reson')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('importations');
    }
}
