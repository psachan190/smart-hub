<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableNewanswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {if(!Schema::hasTable('newquestionanswer')){ 
          Schema::table("newquestionanswer",function($table){
          $table->integer("nexquestion")->unsigned()->nullable()->after("correct_status");
        $table->foreign('nexquestion')->references('id')->on('newquestion');
        }); }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table("newquestionanswer",function($table){
            $table->dropColumn("nexquestion");
        });
    }
}
