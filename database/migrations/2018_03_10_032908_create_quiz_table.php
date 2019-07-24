<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!Schema::hasTable('quiz')) {
            Schema::create(
                'quiz', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('quizTitle',100);
                    $table->string('duration',100); //Table name
                    $table->string('eachMarks',100);
                    $table->string('totalMars', 10);
                    $table->integer('cStatus');
                    $table->date('crDate');
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
        Schema::dropIfExists('quiz');
    }
}
