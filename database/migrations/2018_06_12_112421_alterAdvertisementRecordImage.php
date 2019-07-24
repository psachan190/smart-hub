<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAdvertisementRecordImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       Schema::table('advertisementrecord', function(Blueprint $table) {
			$table->integer('totaluploadPics')->nullable();
			$table->integer('spentuploadspics')->nullable()->after("totaluploadPics");
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
