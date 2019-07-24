<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	if(!Schema::hasTable('advertisement'))
    		{
        Schema::create('advertisement', function (Blueprint $table) {	
           $table->increments('id');
		   $table->integer('users_id')->unsigned()->nullable();
	       $table->foreign("users_id")->references('id')->on("users")->nullable();
		   $table->integer('vendordetails_id')->unsigned()->nullable();
	       $table->foreign("vendordetails_id")->references('id')->on("vendordetails")->nullable();
		   $table->string('startDate',30)->nullable();
	       $table->string("endDate",30)->nullable();
		   $table->integer('ageFrom')->nullable();
		   $table->integer('ageTo')->nullable();
		   $table->integer('gender')->nullable();
		   $table->string('profession')->nullable();
		   $table->text('description')->nullable();
		   $table->string('image')->nullable();
		   $table->integer('postType')->nullable();
		   $table->datetime('created_at')->nullable();
		   $table->datetime('updated_at')->nullable();
		   $table->string('status',5)->nullable();
		   $table->string('adminStatus',5)->nullable();
		   $table->string('applyFilteration',30)->nullable();
		   $table->integer('month')->nullable();
		   $table->integer('year')->nullable();
		   $table->text('paidStatus')->nullable();
	    });
    	}
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
