<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('originalprice',10,2);
            $table->double('price',10,2);
            $table->double('sale_price',10,2);
            $table->string('image');
            $table->string('moreimage');
            $table->string('description');
            $table->string('size');
            $table->string('color');
            $table->tinyInteger('quantity');
            $table->tinyInteger('status');
            $table->tinyInteger('hot');
            $table->integer('cate_id')->unsigned(); 
            
            $table->foreign('cate_id')
            ->references('id')
            ->on('category')
            ->onDelete('cascade');//casi code khoas ngoaij chinh day nay
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
        Schema::dropIfExists('product');
    }
}
