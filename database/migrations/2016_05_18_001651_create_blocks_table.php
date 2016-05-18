<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('blocks', function(Blueprint $table){
      $table->increments('id');
      $table->string('name');
      $table->integer('enterprise_id')->unsigned();
      $table->foreign('enterprise_id')->on('blocks')->references('id');
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
    Schema::drop('blocks');
  }
}
