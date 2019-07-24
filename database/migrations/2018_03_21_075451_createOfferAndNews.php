<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferAndNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("offersandnews",function(Blueprint $table){
		  $table->increments("id");
		  $table->date("startDate",20)->nullable();
		  $table->date("endDate",20)->nullable();
		  $table->string("newsTitle")->nullable();
		  $table->string("newsDescription")->nullable();
		  $table->string("image",20)->nullable();
		  $table->string("newsType",20)->nullanle();
		  $table->date("created_at",20)->nullable();
		  $table->date("updated_at",20)->nullable();
		  $table->string("status",2)->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('offersandnews');
    }
}
