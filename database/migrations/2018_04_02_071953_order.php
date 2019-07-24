<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create("order",function(Blueprint $table){
	     $table->increments("id");
		 $table->string("orderID",50);
		 $table->date("orderDate");
		 $table->string("paymentType")->nullable();
		 $table->string("paymentStatus",2);
		 $table->integer("users_id")->unsigned();
		 $table->foreign("users_id")->references("id")->on("users");
		 $table->integer("address_id")->unsigned();
		 $table->foreign("address_id")->references("id")->on("address");
		 $table->integer("subTotal")->nullable();
		 $table->integer("discount")->nullable();
		 $table->integer("totalAmount")->nullable();
		 $table->string("shippingCharge",20)->nullable();
		 $table->string("orderStatus",5)->nullable();
		 
	   });
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('order');
    }
}
