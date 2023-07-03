<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApiUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('Username')->nullable();
            $table->string('Password')->nullable();
            $table->string('access_token','2500')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('api_users');
    }
}
