<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create("productsAttribute",function(Blueprint $table){
	    $table->increments("id");
		$table->string("name")->nullable();
		$table->integer("category_id")->unsigned();
		$table->foreign("category_id")->references("id")->on("category")->nullable();
		$table->integer("subcategory_id")->unsigned();
		$table->foreign("subcategory_id")->references("sid")->on("subcategory")->nullable();
		$table->string("value")->nullable();
	  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('productsAttribute');
    }
}
