<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnpShopcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         if(!Schema::hasTable('knp_shopcategory'))
            {
            Schema::create('knp_shopcategory', function (Blueprint $table) {
            $table->increments('cid');
            $table->string('cname')->nullable();;
            $table->string('priority')->nullable();;
            $table->string('cDesc')->nullable();;
            $table->string('crDate')->nullable();;
            $table->string('cSataus')->nullable();;
            $table->string('bType')->nullable();;
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
        //
        Schema::dropIfExists('knp_shopcategory');
    }
}
