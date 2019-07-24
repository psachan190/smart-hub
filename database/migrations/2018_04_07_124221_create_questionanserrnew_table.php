<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionanserrnewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!Schema::hasTable('newquestionanswer')){ 
		 Schema::create("newquestionanswer",function(Blueprint $table){
         $table->increments("id");
         $table->integer("newquestion_id")->unsigned();
         $table->string("option1")->nullable();
         $table->string("option2")->nullable();
         $table->string("option3")->nullable();
         $table->string("option4")->nullable();
         $table->string("correct_status")->nullable();
         $table->timestamps();
        $table->foreign('newquestion_id')->references('id')->on('newquestion');
       }); }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('newquestionanswer');
    }
}
