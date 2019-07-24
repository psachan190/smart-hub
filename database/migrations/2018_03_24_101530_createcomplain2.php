<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createcomplain2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       Schema::create("complain",function(Blueprint $table){
	     $table->increments("id");
		 $table->integer("users_id")->unsigned()->nullable();
		 $table->foreign("users_id")->references("id")->on("users")->nullable();
		 $table->integer("vendordetails_id")->unsigned()->nullable();
		 $table->foreign("vendordetails_id")->references('id')->on("vendordetails")->nullable();
		  $table->integer("complainsubject_id")->unsigned()->nullable();
		 $table->foreign("complainsubject_id")->references('id')->on("complainsubject")->nullable();
		 $table->string("type",20)->nullable();
		 $table->date("created_at",20)->nullable();
		 $table->date("updated_at",20)->nullable();
		 $table->char("status",2)->nullable();
	   });
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
         Schema::drop('complain');
    }
}
