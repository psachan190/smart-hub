<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryDayschedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	   Schema::create('deliverydayschedule', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('vendordetails_id')->unsigned()->nullable();
			$table->foreign("vendordetails_id")->references('id')->on("vendordetails")->nullable();
            $table->integer('dayofweek')->nullable();
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
