<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       Schema::create('wishlist', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('users_id')->unsigned()->nullable();
			$table->foreign("users_id")->references('id')->on("users")->nullable();
            $table->integer('products_id')->unsigned()->nullable();
          	$table->foreign("products_id")->references('id')->on("products")->nullable();
			$table->dateTime('created_at');	
			$table->dateTime('updated_at');	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('wishlist');
    }
}
