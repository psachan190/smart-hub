<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('module', function($table){
             $table->integer('status')->after('module')->default('1');
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
          if (Schema::hasColumn('module', 'status')) {
            Schema::table(
                'module', function (Blueprint $table) {
                    $table->dropColumn('status');
                }
            );
        }
    }
}
