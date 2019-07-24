<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GalleryController extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       Schema::create('gallery', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('vendordetails_id')->unsigned()->nullable();
			$table->foreign("vendordetails_id")->references('id')->on("vendordetails")->nullable();
            $table->string('image')->nullable();
			$table->TEXT('title')->nullable();
			$table->dateTime('created_at');	
			$table->dateTime('updated_at');	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
         Schema::drop('gallery');
    }
}
