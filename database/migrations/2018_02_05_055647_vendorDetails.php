<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create("vendorDetails", function(Blueprint $table){
			  $table->increments('id');
			$table->string("vID",20);
			$table->string("vName",20)->nullable();
			$table->string("vEmail",100)->nullable();
			$table->string("vMobile",20)->nullable();
			$table->string("businesscategoryType")->nullable();
			$table->string("categoryType")->nullable();
		    $table->string("crvDate")->nullable();
            $table->string("editDate");
			$table->string("crvStatus")->nullable();
	  }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendorDetails');
    }
}
