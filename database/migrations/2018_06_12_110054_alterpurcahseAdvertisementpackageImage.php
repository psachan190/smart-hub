<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterpurcahseAdvertisementpackageImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
         Schema::table('purchaseadspackagerecord', function(Blueprint $table) {
			$table->integer('totaluploadPics')->nullable();
			$table->integer('numberOfPics')->nullable()->after("numberOfAds");
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
       
    }
}
