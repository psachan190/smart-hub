<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatepostAds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("knp_vPostAds",function(Blueprint $table){
		   $table->increments("id");
		   $table->integer("users_id")->unsigned();
		   $table->foreign("users_id")->references('id')->on("users");
		   $table->integer("vendordetails_id")->unsigned();
		   $table->foreign("vendordetails_id")->references('id')->on("vendordetails");
		   $table->string("postImg");
		   $table->string("startDate",50);
		   $table->string("endDate",50);
		   $table->LongText("postDescription");
		   $table->string("crDate",20);
		   $table->string("adminStaus",2);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("knp_vPostAds");
    }
}
