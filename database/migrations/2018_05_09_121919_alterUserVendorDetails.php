<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserVendorDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('advertisement', function (Blueprint $table) {
          	$table->integer('vendordetails_id')->unsigned()->nullable()->after("users_id");
			$table->foreign("vendordetails_id")->references('id')->on("vendordetails")->nullable();
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
