<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionforAdvertisement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       Schema::create('professionads', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('advertisement_id')->unsigned()->nullable();
			$table->foreign("advertisement_id")->references('id')->on("advertisement")->nullable();
            $table->integer('profession')->nullable();
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
