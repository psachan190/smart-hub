<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorSrvices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       Schema::create("knp_vendorServices",function(Blueprint $table){
		   $table->increments("id");
		   $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users');
		   $table->integer('knp_shopcategory_id')->unsigned();
		   $table->foreign('knp_shopcategory_id')->references('cid')->on('knp_shopcategory');
		   $table->integer("vendordetails_id")->unsigned();
		   $table->foreign('vendordetails_id')->references('id')->on('vendordetails');
		   $table->longText("serviceDescription")->nullable();
		   $table->Text("primeServices")->nullbale();
		   $table->Text("ourServices")->nullable();
		   $table->string("infoMobile")->nullable();
		   $table->string("infoEmail")->nullable();
		   $table->string("address")->nullable();
		   $table->string("timming",100)->nullable();
		   $table->string("weaklyOff",20)->nullable();
		   $table->Text("metaKeywords")->nullable();
		   $table->string("crDate",20)->nullable();
		   $table->string("editDate",20)->nullable();
		   $table->string("cSatus",2)->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists("productsImage");
    }
}
