<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorShopImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("knp_vendorShopImage",function(Blueprint $table){
		   $table->increments("id");
		   $table->integer("users_id")->unsigned();
		   $table->foreign("users_id")->references("id")->on("users");
		   $table->integer("vendordetails_id")->unsigned();
		   $table->foreign("vendordetails_id")->references("id")->on("vendordetails");
		   $table->string("thumbsnailPath",100)->nullable();
		   $table->string("thumbnailsImg",100)->nullable();
		   $table->string("shoplogoPath",100)->nullable();
		   $table->string("shoplogoImg",100)->nullable();
		   $table->string("editDate",30)->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("knp_vendorShopImage");
    }
}
