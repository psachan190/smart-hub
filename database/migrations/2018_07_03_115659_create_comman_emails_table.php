<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommanEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comman_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer("users_id");
			$table->integer("knp_sections")->nullable();
			$table->integer("knp_sections_id")->nullable();
			$table->string("emails");
			$table->string("emailType");
			$table->string('status',2)->nullable();
			$table->string('verifyStatus',2)->nullable();
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
        Schema::dropIfExists('comman_emails');
    }
}
