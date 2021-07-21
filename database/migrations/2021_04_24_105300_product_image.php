<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('prod_id')->unsigned();
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
        Schema::dropIfExists('product_image');
    }
}
