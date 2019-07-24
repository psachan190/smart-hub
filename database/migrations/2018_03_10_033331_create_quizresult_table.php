<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizresultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!Schema::hasTable('quizresult')) {
            Schema::create(
                'quizresult', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('participateID');
                    $table->string('numberOfref'); //Table name
                    $table->string('noofTrue');
                    $table->string('noofFalse');
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
         Schema::dropIfExists('quizresult');
    }
}
