<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_user')->index()->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

            $table->integer('id_product')->index()->unsigned();
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');;

            $table->unique(['id_product', 'id_user']);
            $table->integer('puntuacion');
            $table->string('comentario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
