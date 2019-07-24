<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecomplainDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create("complainDetails",function(Blueprint $table){
	     $table->increments("id");
		 $table->integer("complain_id")->unsigned()->nullable();
		 $table->foreign("complain_id")->references("id")->on("complain")->nullable();
		 $table->integer("sendorID");
		 $table->integer("recieverID");
		 $table->longText("message");
		 $table->date("created_at",20)->nullable();
		 $table->date("updated_at",20)->nullable();
		 $table->string("status",2)->nullable(); 
	   }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('complainDetails');
    }
}
