<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPackafeForType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
       Schema::table('advertisementpackage', function(Blueprint $table) {
			$table->integer('forPackageTye')->nullable();
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
