<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function(Blueprint $table){
          $table->increments('id');
          $table->decimal('percentage', 15, 2)->default(0.00);
          $table->integer('lot_id')->unsigned();
          $table->foreign('lot_id')->references('id')->on('lots');
          $table->integer('broker_id')->nullable()->unsigned();
          $table->foreign('broker_id')->references('id')->on('users');
          $table->integer('status_id')->unsigned();
          $table->foreign('status_id')->references('id')->on('status');
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
        Schema::drop('sales');
    }
}
