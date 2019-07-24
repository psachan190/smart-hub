<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterVSalesAuthority extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("vsalesautority",function($table){
		   $table->integer('knp_shopcategory_id')->unsigned()->after('vendordetails_id');
		   //$table->foreign('knp_shopcategory_id')->references('cid')->on('knp_shopcategory');
		   $table->foreign('knp_shopcategory_id')->references('cid')->on('knp_shopcategory')->nullable();
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
