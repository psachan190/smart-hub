<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVsalesAuthority extends Migration
{
   
    public function up(){
       Schema::create("vSalesAutority",function(Blueprint $table){
	      $table->increments("id");
		  $table->integer("vendordetails_id")->unsigned()->nullable();
		  $table->foreign('vendordetails_id')->references('id')->on('vendordetails')->nullable();
		  $table->integer("category_id")->unsigned()->nullable();
		  $table->foreign("category_id")->references('id')->on('category')->nullable();
		  $table->integer('subcategory_id')->unsigned()->nullable();
		  $table->foreign('subcategory_id')->references('sid')->on('subcategory')->nullable();
		  $table->string('created_at')->nullable();
		  $table->string('updated_at')->nullable();
	   });
    }

    public function down(){
      Schema::drop('vSalesAutority');
    }
}
