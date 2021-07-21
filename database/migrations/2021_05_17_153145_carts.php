<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Carts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prod_image');
            $table->string('prod_name');
            $table->double('prod_price');
            $table->tinyInteger('prod_quantity');
            $table->integer('prod_id')->unsigned();          
            $table->foreign('prod_id')
            ->references('id')
            ->on('product')
            ->onDelete('cascade');
            
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->unsigned()
            ->references('id')
            ->on('customer')
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
        Schema::dropIfExists('carts');
    }
}
