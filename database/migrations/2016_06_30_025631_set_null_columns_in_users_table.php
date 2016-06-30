<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullColumnsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
          $table->string('creci')->nullable()->change();
          $table->text('phones')->nullable()->change();//era pra ser json mas não ta funfando
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function(Blueprint $table){
        $table->string('creci')->change();
        $table->text('phones')->change();//era pra ser json mas não ta funfando
      });
    }
}
