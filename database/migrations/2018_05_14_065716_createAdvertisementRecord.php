<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	  Schema::create('advertisementrecord', function (Blueprint $table) {	
       $table->increments('id');
	   $table->integer('users_id')->unsigned()->nullable();
	   $table->foreign("users_id")->references('id')->on("users")->nullable();
	   $table->integer('vendordetails_id')->unsigned()->nullable();
	   $table->foreign("vendordetails_id")->references('id')->on("vendordetails")->nullable();
	   $table->integer('totalAds')->nullable();
	   $table->integer('spentAds')->nullable();
	   $table->integer('remainingAds')->nullable();
	   $table->integer('Adsdate')->nullable();
	   $table->integer('Adsmonth')->nullable();
	   $table->integer('AdsYear')->nullable();
	  }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
