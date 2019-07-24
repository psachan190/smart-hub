<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorChoosecategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //if(!Schema::hasTable('VendorChoosecategory')){ 
        Schema::create('vChoosecategory', function (Blueprint $table) {
            $table->increments('id');
			$table->string('vID');
			$table->string('vEmail');
            $table->string('categoryType');
            $table->string('vcrDate')->nullable();
            $table->string('vCstatus')->nullable();
	    });
	 //}  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('vChoosecategory'); 
    }
}
