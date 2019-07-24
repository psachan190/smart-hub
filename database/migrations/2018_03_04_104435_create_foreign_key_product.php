<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn("user_email");
            $table->integer('users_id')->unsigned()->change();
            $table->integer('knp_shopcategory_id')->unsigned()->change();
            $table->integer('vendordetails_id')->unsigned()->change();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('knp_shopcategory_id')->references('cid')->on('knp_shopcategory')->onDelete('cascade');
            $table->foreign('vendordetails_id')->references('id')->on('vendordetails')->onDelete('cascade');   
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
