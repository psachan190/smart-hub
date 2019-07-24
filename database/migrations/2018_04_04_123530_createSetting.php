<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("shopSetting",function(Blueprint $table){
	     $table->increments("id");
		 $table->integer("vendordetails_id")->unsigned();
		 $table->foreign("vendordetails_id")->references("id")->on("vendordetails");
		 $table->string("paymentMode",10)->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shopSetting');
    }
}
