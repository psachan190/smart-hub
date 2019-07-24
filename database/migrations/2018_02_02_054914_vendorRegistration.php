<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('VendorRegistration')){ 
        Schema::create('VendorRegistration', function (Blueprint $table) {
            $table->increments('vID');
			$table->string('vName');
			$table->string('vEmail');
            $table->string('vPassword');
            $table->string('vMobile');
            $table->string('vcrDate')->nullable();
            $table->string('vCstatus');
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
        Schema::dropIfExists('VendorRegistration'); 
    }
}
