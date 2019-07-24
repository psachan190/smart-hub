<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table("products",function($table){
	      $table->string("crpDate",20)->change()->nullable();
		  $table->string("soldOut",20)->nullable();
		  $table->string("updated_date",20)->nullable();
		  $table->string("trash",2)->change()->nullable();
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
