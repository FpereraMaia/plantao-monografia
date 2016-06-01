<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteColumnAndUserRelation extends Migration
{
    /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
      Schema::create('clients', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->timestamps();
      });

      Schema::table('users', function (Blueprint $table) {
          $table->integer('client_id')->unsigned();
          $table->foreign('client_id')->references('id')->on('clients');
      });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
      Schema::table('users', function (Blueprint $table) {
          $table->dropForeign('users_client_id_foreign');
          $table->dropColumn('client_id');
      });
      Schema::drop('clients');
  }
}
