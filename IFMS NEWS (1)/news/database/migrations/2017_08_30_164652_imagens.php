<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Imagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('imagens', function(Blueprint $table) {
        $table->increments('id');
        $table->string('nomeantigo');
        $table->string('novonome');
        $table->integer('post');
        $table->timestamps();

      });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('imagens');
//
    }
}
