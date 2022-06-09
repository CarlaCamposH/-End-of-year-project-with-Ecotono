<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('date')->default_CURRENT_TIMESTAMP();
            $table->integer('id_cupon')->unsigned()->nullable();
            $table->foreign('id_cupon')->references('id')->on('coupons')->onDelete('set null');
            $table->string('name_user');
            $table->string('direccion_de_envio');
            $table->text('productos',65000);
            $table->double('total_price');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
