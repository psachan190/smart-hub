<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNgosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('ngo_tbl', function (Blueprint $table) {
           $table->increments('id');
           $table->integer("users_id")->unsigned();
		   $table->foreign("users_id")->references("id")->on("users_id");
		   $table->string("ngo_name");
		   $table->text("about_us");
		   $table->string('status',2);
		   $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ngo_tbl');
    }
}
