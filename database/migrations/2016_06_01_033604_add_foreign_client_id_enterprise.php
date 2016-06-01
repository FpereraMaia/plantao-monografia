<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignClientIdEnterprise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enterprises', function(Blueprint $table){
          $table->integer('client_id')->unsigned();
          $table->foreign('client_id')->references('id')->on('clients');
          $table->dropForeign('enterprises_user_id_foreign');
          $table->dropColumn('user_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enterprises', function(Blueprint $table){
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
          $table->dropForeign('enterprises_client_id_foreign');
          $table->dropColumn('client_id');
        });
    }
}
