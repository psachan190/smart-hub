<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorBusinesstype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('knp_VendorBusinesstype')){ 
        Schema::create('knp_VendorBusinesstype',function (Blueprint $table) {
            $table->increments('id');
			$table->string('vID');
			$table->string('vbType');
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
       Schema::dropIfExists('knp_VendorBusinesstype'); 
    }
}
