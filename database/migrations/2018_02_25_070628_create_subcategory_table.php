<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         if(!Schema::hasTable('subcategory'))
            {
            Schema::create('subcategory', function (Blueprint $table) {
            $table->increments('sid');
            $table->string('shopCatid')->nullable();
            $table->string('catID')->nullable();
            $table->string('subCatname')->nullable();
            $table->string('sCatpriority')->nullable();
            $table->string('subDesc')->nullable();
            $table->string('subcrDate')->nullable();
            $table->string('subcstatus')->nullable();            
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
        //
        Schema::dropIfExists('subcategory');
    }
}
