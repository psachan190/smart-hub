<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('advertisementpackage', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('numberOfAds')->nullable();
		    $table->integer('packageAmount')->nullable();
            $table->string('title')->nullable();
			$table->dateTime('created_at')->nullable();	
			$table->dateTime('updated_at')->nullable();	
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
