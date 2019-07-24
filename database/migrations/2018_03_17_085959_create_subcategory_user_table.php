<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('subcategory_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('vendordetails_id')->unsigned();
            $table->integer('knp_shopcategory_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->integer('subcategory_id')->unsigned();
		 	$table->timestamps();
			
			$table->foreign('users_id')->references('id')->on('users');	
			$table->foreign('vendordetails_id')->references('id')->on('vendordetails');	
			$table->foreign('knp_shopcategory_id')->references('cid')->on('knp_shopcategory');	
			$table->foreign('category_id')->references('id')->on('category');	
			$table->foreign('subcategory_id')->references('sid')->on('subcategory');	
			//knp_shopcategory	
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
		 Schema::dropIfExists('subcategory_users');
    }
}
