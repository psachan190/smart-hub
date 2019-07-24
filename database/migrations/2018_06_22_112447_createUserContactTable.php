<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        if(!Schema::hasTable("userenquiry_tbl")){
		  Schema::create("userenquiry_tbl",function(Blueprint $table){
		    $table->increments("id");
			$table->string("name",100)->nullable();
			$table->string("email",200)->nullable();
			$table->string("mobile",20)->nullable();
			$table->text("comment")->nullable();
			$table->bigInteger("create_at")->nullable();
			$table->bigInteger("updated_at")->nullable();
			$table->boolean("readStatus")->nullable();
			$table->boolean("Status")->nullable();
		  });   
		};
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userenquiry_tbl');

    }
}
