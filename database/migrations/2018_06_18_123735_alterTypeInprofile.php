<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class AlterTypeInprofile extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

       Schema::table("profiletypecategory",function($table){

	     $table->string("type")->change();

	   });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        //

    }

}

