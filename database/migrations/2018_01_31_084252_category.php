<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if(!Schema::hasTable('category')){ 
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
			$table->string('shopCatid');
            $table->string('csname');
            $table->string('cpriority');
            $table->string('cDesc');
            $table->string('ccrDate');
			$table->string('cstatus');
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
      Schema::dropIfExists('category');
    }
}
