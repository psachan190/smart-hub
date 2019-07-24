<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',100);
            $table->string('password',50);
			$table->string("mobile",20)->nullable();
			$table->string("pincode",20)->nullable();
			$table->char("vStatus",5)->nullable();
			$table->char("cStatus",5)->nullable();
			$table->string("role_id",5);
            $table->rememberToken()->nullable();
            $table->string("crDate",20)->nullable();
            $table->string("editDate",20)->nullable();
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
        Schema::dropIfExists('users');
    }
}
