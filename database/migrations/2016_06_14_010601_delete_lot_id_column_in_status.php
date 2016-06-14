<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteLotIdColumnInStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('status', function(Blueprint $table){
          $table->dropForeign('status_lot_id_foreign');
          $table->dropColumn('lot_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status', function(Blueprint $table){
          $table->integer('lot_id')->nullable()->unsigned();
          $table->foreign('lot_id')->references('id')->on('lots');
        });
    }
}
