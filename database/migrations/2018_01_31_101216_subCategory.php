<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	  if(!Schema::hasTable('category')){ 
        Schema::create('SubCategory', function (Blueprint $table) {
            $table->increments('sid');
			$table->string('shopCatid');
			$table->string('catID');
            $table->string('subCatname');
            $table->string('sCatpriority');
            $table->string('subDesc')->nullable();
            $table->string('subcrDate');
			$table->string('subcstatus');
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
       Schema::dropIfExists('SubCategory');
    }
}
