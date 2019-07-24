<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::defaultStringLength(191);
		Schema::table('products', function (Blueprint $table) {
			 
			 $table->charset = 'utf8';
 			$table->collation = 'utf8_unicode_ci';
			$table->integer('category_id')->unsigned()->change();
    		$table->foreign('category_id')->references('id')->on('category');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
