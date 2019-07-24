<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDateformmatofferNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("offersandnews",function($table){
		  $table->string("startDate",20)->change();
		  $table->string('endDate',20)->change();
		   $table->string('created_at',20)->change();
		    $table->string('updated_at',20)->change();
			 $table->string('adminStatus',2)->nullable();
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
