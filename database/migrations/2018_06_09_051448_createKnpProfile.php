<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnpProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
      if(!Schema::hasTable('knp_profile_tbl')){
        Schema::create('knp_profile_tbl', function (Blueprint $table) {	
           $table->increments('id');
		   $table->integer('users_id')->unsigned()->nullable();
		   $table->foreign("users_id")->references('id')->on("users")->nullable();
	       $table->string('profileName',100)->nullable();
		   $table->integer("profileType")->nullable();
		   $table->integer('profiletypecategory_id')->unsigned()->nullable();
		   $table->foreign("profiletypecategory_id")->references('id')->on("profiletypecategory")->nullable();
		   $table->integer("packageAmount")->nullable();
		   $table->string("profileImage")->nullable();
		   $table->string("term",10)->nullable();
		   $table->bigInteger("created_at")->nullable();
		   $table->bigInteger("updated_at")->nullable();
	       $table->string("status",2)->nullable();
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
