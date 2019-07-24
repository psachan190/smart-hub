<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTypecategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('profiletypecategory'))
    		{
        Schema::create('profiletypecategory', function (Blueprint $table) {	
           $table->increments('id');
		   $table->integer('profileType')->nullable();
	       $table->integer('profileTypeCat')->unsigned()->nullable();
	       $table->string("status",2)->nullable();
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
