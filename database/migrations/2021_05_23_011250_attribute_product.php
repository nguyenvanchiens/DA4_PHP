<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttributeProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prod_id')->unsigned();
            $table->integer('attribute_value_id')->unsigned();
            $table->foreign('prod_id')
            ->references('id')
            ->on('product')
            ->onDelete('cascade');
            $table->foreign('attribute_value_id')
            ->references('id')
            ->on('attribute_value')
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
        Schema::dropIfExists('attribute_product');
    }
}
