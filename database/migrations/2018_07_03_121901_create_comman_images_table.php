<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommanImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comman_images', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer("users_id")->unsigned();
			$table->integer("knp_sections")->unsigned();
			$table->integer("knp_sections_id")->unsigned();
			$table->string("images")->nullable();
			$table->string("image_type",2)->nullable();
			$table->string("image_title")->nullable();
			$table->string("status",2)->nullable();
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
        Schema::dropIfExists('comman_images');
    }
}
