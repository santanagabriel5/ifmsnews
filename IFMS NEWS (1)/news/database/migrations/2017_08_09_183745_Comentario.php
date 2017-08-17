<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comentario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Comentarios', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nome');
          $table->text('texto');
          $table->string('email')->nullable();
          $table->boolean('estado')->default(1);
          $table->integer('id_post');
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
      Schema::dropIfExists('Comentarios');
  //
    }
}
