<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendShops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('recommendshops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shopname');
            $table->integer('shopcategory_id')->unsigned()->nullable();
            $table->text('location');
            $table->timestamps();
            $table->foreign('shopcategory_id')->references('cid')->on('knp_shopcategory')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recommendshops');
    }
}
