<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
       Schema::table("order",function($table){
		  $table->string("firstName",50)->nullable()->after("orderID");
		  $table->string("lastName",50)->nullable()->after("firstName");
		  $table->string("AddressType",20)->nullable()->after("address_id");
		  $table->string("phoneNumber",12)->nullable()->after("AddressType");
		   $table->integer("vendordetails_id")->unsigned()->nullable();
		   $table->foreign("vendordetails_id")->references("id")->on("vendordetails")->nullable();
		});
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
