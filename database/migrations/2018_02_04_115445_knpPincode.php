<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KnpPincode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create("knpPincode", function(Blueprint $table){
	        $table->increments('id');
			$table->string("pincode",20);
			$table->string("city")->nullable();
			$table->string("pinStatus")->nullable();
	  });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('knpPincode');
    }
}
