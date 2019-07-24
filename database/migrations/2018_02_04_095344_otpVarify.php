<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OtpVarify extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if(!Schema::hasTable('otpVerify')){ 
       Schema::create('otpVerify', function (Blueprint $table) {
            $table->increments('otpID');
            $table->string('mobileNumber');
            $table->string('selfOTP');
            $table->string('userOTP');
            $table->string('created_date');
			$table->string('updated_date');
        });
	 }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otpVerify');
    }
}
