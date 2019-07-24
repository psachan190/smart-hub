<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorBusinessdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("knp_vBusinessDetail",function(Blueprint $table){
		   $table->increments("id");
		   $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users');
		   $table->integer("vendordetails_id")->unsigned();
		   $table->foreign("vendordetails_id")->references('id')->on('vendordetails');
		   $table->string("ownerName",100)->nullable();
		   $table->longText("aboutBusiness")->nullable();
		   $table->string("gstNumber",20)->nullable();
		   $table->string("gstFile",100)->nullable();
		   $table->string("gstFilepath")->nullable();
		   $table->string("tanNumber",50)->nullable();
		   $table->string("tanFile",100)->nullable();
		   $table->string("tanFilePath")->nullable();
		   $table->string("cinNumber",50)->nullable();
		   $table->string("cinFile",100)->nullable();
		   $table->string("cinFilePath")->nullable();
		   $table->string("signature")->nullable();
		   $table->string("signaturePath")->nullable();
		   $table->string("address1")->nullable();
		   $table->string("address2")->nullable();
		   $table->string("pinCode",20)->nullable();
		   $table->string("city",100)->nullable();
		   $table->string("state",100)->nullable();
		   $table->string("editDate",50)->nullable();
		   $table->string("cbusinesStatus")->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::dropIfExists("knp_vBusinessDetail");
    }
}
