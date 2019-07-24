<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizanswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!Schema::hasTable('quizanswer')) {
            Schema::create(
                'quizanswer', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('sessionID',100);
                    $table->string('questionID',100); //Table name
                    $table->string('correctAnswer',100);
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
          Schema::dropIfExists('quizanswer');
    }
}
