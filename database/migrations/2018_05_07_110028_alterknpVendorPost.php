<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterknpVendorPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       Schema::create('advertisement', function (Blueprint $table) {
         $table->increments('id');
		 $table->integer('users_id')->unsigned();
		 $table->foreign("users_id")->references('id')->on("users")->nullable();
		  $table->string('firstName',100)->nullable();
	      $table->string('lastName',100)->nullable();
		  $table->string('mobile',15)->nullable();
		  $table->string('contactEmail',100)->nullable();
		  $table->string('startDate',10)->nullable();
		   $table->string('endDate',10)->nullable();
		  $table->string('ageFrom',10)->nullable();
		  $table->string('ageTo',10)->nullable();
		  $table->integer('gender')->nullable();
		  $table->TEXT('profession')->nullable();
		  $table->TEXT('description')->nullable();
		  $table->string('image')->nullable();
		  $table->string('postType',10)->nullable();
		  
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
