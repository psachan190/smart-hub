<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::table("orderdetails",function($table){
		  $table->integer("tax")->after("qty")->nullable();	  
		  $table->integer("gst")->after("qty")->nullable();	  
		  $table->string("editDate",30)->after("cStatus")->nullable();
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
