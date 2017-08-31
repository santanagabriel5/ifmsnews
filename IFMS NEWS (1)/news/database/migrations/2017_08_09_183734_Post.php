<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Posts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('titulo');
          $table->string('texto');
          $table->string('chamada');
          $table->boolean('estado')->default(1);
          $table->integer('id_user');
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
      Schema::dropIfExists('Posts');

        //
    }
}
