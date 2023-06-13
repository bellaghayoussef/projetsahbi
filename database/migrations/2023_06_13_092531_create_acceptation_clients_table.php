<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAcceptationClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acceptation_clients', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('User_id')->unsigned()->nullable()->index();
            $table->integer('Client_id')->unsigned()->nullable()->index();
            $table->string('commenter')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('acceptation_clients');
    }
}
