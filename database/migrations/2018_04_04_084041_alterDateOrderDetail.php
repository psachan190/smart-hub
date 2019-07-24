<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDateOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("orderdetails",function($table){
		  $table->dateTime("paymentDate")->change();
		  $table->string("salePrice",20)->change();
		  $table->string("subTotProductsAmt",20)->change();
		  $table->string("subTotProductsAmt",20)->change();
		  $table->string("salePrice",20)->change();
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
