<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferandProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productsinoffer_tbl', function (Blueprint $table) {	
           $table->increments('id');
		   $table->integer('offersandnews_id')->unsigned()->nullable();
	       $table->foreign("offersandnews_id")->references('id')->on("offersandnews")->nullable();
		   $table->integer('products_id')->unsigned()->nullable();
	       $table->foreign("products_id")->references('id')->on("products")->nullable();
		   $table->dateTime('created_at')->nullable();
		   $table->dateTime('updated_at')->nullable();
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
