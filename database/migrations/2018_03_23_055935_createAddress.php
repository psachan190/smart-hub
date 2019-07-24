<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
    	if(!Schema::hasTable('address'))
    		{
			       Schema::create("address",function(Blueprint $table){
				     $table->increments("id");
					 $table->integer("users_id")->unsigned()->nullable();
					 $table->foreign("users_id")->references("id")->on("users")->nullable();
					 $table->integer("vendordetails_id")->unsigned()->nullable();
					 $table->foreign("vendordetails_id")->references('id')->on("vendordetails")->nullable();
					 $table->string("addressOne")->nullbale();
					 $table->string("addressTwo")->nullable();
					 $table->string("neighbourhood")->nullable();
					 $table->string("city",50)->nullable();
					 $table->integer("pincode")->nullable();
					 $table->string("state",50)->nullable();
					 $table->string("whenStart",20)->nullable();
					 $table->string("end",20)->nullable();
					 $table->string("image")->nullable();
					 $table->string("type",30)->nullable();
					 $table->date("created_at")->nullable();
					 $table->date("updated_at")->nullable();
					 $table->char("2")->nullable();
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
          Schema::drop('address');
    }
}
