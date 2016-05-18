<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function(Blueprint $table){
          $table->increments('id');
          $table->string('name');
          $table->string('cnpj')->unique();
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->on('users')->references('id');
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
        Schema::drop('enterprises');
    }
}
