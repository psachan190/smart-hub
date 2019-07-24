<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPurchaseAdsPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchaseadspackagerecord', function (Blueprint $table) {
			$table->integer('numberOfAds')->nullable()->after("amount");
          	$table->integer('totalAds')->nullable()->after("amount");
			$table->integer('spentAds')->nullable();
			$table->integer('packageType')->nullable();
			$table->integer("closeStatus")->nullable()->after("cStatus");
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
