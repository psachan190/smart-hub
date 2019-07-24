<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpurchaseAdsrecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('purchaseadspackagerecord', function (Blueprint $table) {	
       $table->increments('id');
	   $table->integer('users_id')->unsigned()->nullable();
	   $table->foreign("users_id")->references('id')->on("users")->nullable();
	   $table->integer('vendordetails_id')->unsigned()->nullable();
	   $table->foreign("vendordetails_id")->references('id')->on("vendordetails")->nullable();
	   $table->integer('advertisementpackage_id')->unsigned()->nullable();
	   $table->foreign("advertisementpackage_id")->references('id')->on("advertisementpackage")->nullable();
	   $table->dateTime('startDate')->nullable();
	   $table->dateTime('endDate')->nullable();
	   $table->integer('cStatus')->nullable();
	   $table->string('payStatus',10)->nullable();
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
