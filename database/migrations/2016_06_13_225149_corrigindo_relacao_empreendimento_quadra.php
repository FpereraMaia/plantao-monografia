<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorrigindoRelacaoEmpreendimentoQuadra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blocks', function(Blueprint $table){
          $table->dropForeign('blocks_enterprise_id_foreign');
          $table->foreign('enterprise_id')->references('id')->on('enterprises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('blocks', function(Blueprint $table){
        $table->dropForeign('blocks_enterprise_id_foreign');
        $table->foreign('enterprise_id')->references('id')->on('blocks');
      });
    }
}
