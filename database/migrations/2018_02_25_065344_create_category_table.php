<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(!Schema::hasTable('category'))
            {
            Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shopCatid')->nullable();;
            $table->string('csname')->nullable();;
            $table->string('cpriority')->nullable();;
            $table->string('cDesc')->nullable();;
            $table->string('ccrDate')->nullable();;
            $table->string('cstatus')->nullable();;
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
         Schema::dropIfExists('category');
    }
}
