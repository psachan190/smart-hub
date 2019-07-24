<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrderDetailsgst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
		
        Schema::table("orderdetails",function($table){
		 $table->string("withGst",20)->nullable()->after("gst");
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
