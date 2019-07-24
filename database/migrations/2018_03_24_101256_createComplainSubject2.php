

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainSubject2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("complainSubject",function(Blueprint $table){
	     $table->increments("id");
		 $table->string("subject");
		 $table->date("created_at",20)->nullable();
		 $table->date("updated_at",20)->nullable(); 
	   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('complainSubject');
    }
}
