<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class AlterPostInProfileType extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up(){

       Schema::table("posts",function($table){

		// $table->integer("knp_profile_tbl_id")->unsigned()->after("group_id")->nullable();

		 // $table->foreign("knp_profile_tbl_id")->references('id')->on("knp_profile_tbl")->nullable();

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

