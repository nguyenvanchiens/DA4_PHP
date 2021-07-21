<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orderdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetail', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('quantity');
            $table->double('price',10,2);
            $table->integer('order_id')->unsigned();
            $table->integer('prod_id')->unsigned();
            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->onDelete('cascade');
            $table->foreign('prod_id')
            ->references('id')
            ->on('product')
            ->onDelete('cascade');
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
        Schema::dropIfExists('orderdetail');
    }
}
