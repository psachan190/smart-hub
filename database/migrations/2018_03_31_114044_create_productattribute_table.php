<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductattributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_attribute_tb', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id')->unsigned();
            $table->integer('productsattribute_id')->unsigned();
            $table->string('value');
            $table->integer('status')->default('1');
            $table->timestamps();
            $table->foreign('products_id')->references('id')->on('products'); 
            $table->foreign('productsattribute_id')->references('id')->on('productsattribute'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
