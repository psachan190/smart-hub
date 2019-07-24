<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizanalysis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		 if(!Schema::hasTable('quizanalysis')){ 
         Schema::create("quizanalysis",function(Blueprint $table){
         $table->increments("id");
         $table->integer("user_id")->unsigned()->nullable();
         $table->integer("newquestion_id")->unsigned();
         $table->integer("newquestionanswer_id")->unsigned();
         $table->timestamps();
        $table->foreign('newquestion_id')->references('id')->on('newquestion')->delete('cascade');
         $table->foreign('newquestionanswer_id')->references('id')->on('newquestionanswer')->delete('cascade');
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
        Schema::drop('quizanalysis');
    }
}
