<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
	  if(!Schema::hasTable('knp_shopCategory')){ 
       Schema::create('knp_shopCategory', function (Blueprint $table) {
            $table->increments('cid');
            $table->string('cname');
            $table->string('priority');
            $table->string('cDesc');
            $table->string('crDate');
			$table->string('cSataus');
            $table->timestamps();
        });
	  }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
       Schema::dropIfExists('knp_shopCategory');
    }
}
