<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
           if(!Schema::hasTable('question')) {
            Schema::create(
                'question', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('quizID');
                    $table->text('quetion'); //Table name
                    $table->text('firstAnswer');
                    $table->text('secondAnswer');
                    $table->text('thirdnswer');
                    $table->text('fourthAnswer');
                    $table->text('qcorrectAnswer');
                    $table->date('crDate');
                    $table->integer('cStatus');
                    $table->timestamps();
                }
            );
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
         Schema::dropIfExists('question');
    }
}
