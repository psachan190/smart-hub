<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventcategory', function (Blueprint $table) {	
          $table->increments('id');
	      $table->string('categoryName')->nullable();
		  $table->TEXT('categoryDescription')->nullable();
		  $table->integer('priority')->nullable();
		  $table->dateTime('created_at')->nullable();
		  $table->dateTime('updated_at')->nullable();
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
