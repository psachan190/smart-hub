<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryTimeSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('deliveryTimingschedule', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('vendordetails_id')->unsigned()->nullable();
			$table->foreign("vendordetails_id")->references('id')->on("vendordetails")->nullable();
			$table->integer('dayOfweek')->nullable();
            $table->integer('timingOfday')->nullable();
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
