<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterShopSetiing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopSetting', function (Blueprint $table) {
            $table->renameColumn('paymentMode','advanceforDelivery');
			$table->integer('advancedforPickup')->nullable();
            $table->integer('payatDelivery')->nulable();
			$table->integer('payatPickup')->nullable();
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
