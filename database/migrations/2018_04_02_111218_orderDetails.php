<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create("orderdetails",function(Blueprint $table){
	     $table->increments("id");
		 $table->integer("order_id")->unsigned();
		 $table->foreign("order_id")->references("id")->on("order");
		 $table->integer("products_id")->unsigned();
		 $table->foreign("products_id")->references("id")->on("products");
		 $table->integer("vendordetails_id")->unsigned();
		 $table->foreign("vendordetails_id")->references("id")->on("vendordetails");
		 $table->integer("salePrice")->nullable();
		 $table->integer("qty")->nullable();
		 $table->integer("subTotProductsAmt")->nullable();
		 $table->string("paymentStatus",2)->nullable();
		 $table->date("paymentDate")->nullable();
		 $table->string("cStatus",2)->nullable();
	   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orderdetails');

    }
}
