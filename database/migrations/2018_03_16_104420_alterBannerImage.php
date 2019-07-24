<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBannerImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
      Schema::table("knp_vendorshopimage",function(Blueprint $table){
          $table->string("bannerImagePath")->nullable()->after("shoplogoImg");
		  $table->string("bannerImage")->nullable()->after("shoplogoImg");
		  $table->string("bannerImageeditdate")->nullable()->after("editDate");
	   });
	   
	   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('knp_vendorshopimage', function (Blueprint $table) {
            $table->dropColumn('bannerImage');
			$table->dropColumn('bannerImagePath');
         });
    }
}
