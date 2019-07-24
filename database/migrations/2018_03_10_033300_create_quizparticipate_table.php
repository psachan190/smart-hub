<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizparticipateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(!Schema::hasTable('quizparticipate')) {
            Schema::create(
                'quizparticipate', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('name');
                    $table->string('email'); //Table name
                    $table->string('mobile');
                    $table->string('pinCode');
                    $table->string('refCode');
                    $table->string('prefCode');
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
         Schema::dropIfExists('quizparticipate');
    }
}
