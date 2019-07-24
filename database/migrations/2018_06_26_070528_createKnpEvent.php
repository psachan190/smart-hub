<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnpEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
	 if(!Schema::hasTable("knpevent_tbl")){ 	
      Schema::create("knpevent_tbl",function(Blueprint $table){
	      $table->increments("id");
		  $table->boolean("admin_id")->nullable();
		  $table->integer("users_id")->unsigned()->nullable();
		  $table->foreign("users_id")->references('id')->on("users")->nullable();
		  $table->integer("knp_profile_tbl_id")->unsigned()->nullable();
		  $table->foreign("knp_profile_tbl_id")->references('id')->on("knp_profile_tbl");
		  $table->integer("eventcategory_id")->unsigned();
		  $table->foreign("eventcategory_id")->references("id")->on("eventcategory");
		  $table->text("evntTitle")->nullable();
		  $table->string("location")->nullable();
		  $table->longText("description")->nullable();
		  $table->string("image")->nullable();
		  $table->string("startdate",100)->nullable();
		  $table->string("endDate",100)->nullable();
		  $table->bigInteger("created_at")->nullable();
		  $table->bigInteger("updated_at")->nullable();
		  $table->boolean("status");
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
    }
}
