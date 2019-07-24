<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
      Schema::create("productsImage",function(Blueprint $table){
		  $table->increments("id");
		  $table->integer('users_id')->unsigned();
		  $table->foreign('users_id')->references('id')->on('users');
		  $table->integer('vendordetails_id')->unsigned();
		  $table->foreign('vendordetails_id')->references('id')->on('vendordetails');
		  $table->integer('products_id')->unsigned();
		  $table->foreign('products_id')->references('id')->on('products');
		  $table->string("imagePath")->nullable();
		  $table->longText("image")->nullable();
		  $table->string("thumbImgpath")->nullable();
		  $table->longText("thumbImg")->nullable();
		  $table->string("crDate",20)->nullable();
		  $table->string("editDate",20)->nullable();
		  $table->char("cStatus",2)->nullable();
	  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists("productsImage");
    }
}
