<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		if(!Schema::hasTable('knp_shopCategory')){ 
       Schema::create("newquestion",function(Blueprint $table){
         $table->increments("id");
         $table->text("question")->nullable();
         $table->string("question_type",3)->nullable();
         $table->integer("Orderno")->default('0');
         $table->timestamps();
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
         Schema::drop('newquestion');
    }
}
