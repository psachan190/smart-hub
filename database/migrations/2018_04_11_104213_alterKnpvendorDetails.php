<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterKnpvendorDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
		Schema::table("knp_vbusinessdetail",function($table){
		  if(Schema::hasColumn('knp_vbusinessdetail', 'cinNumber')){
			   $table->dropColumn("cinNumber");
			 }
		  if(Schema::hasColumn('knp_vbusinessdetail', 'cinFile')){
			   $table->dropColumn("cinFile");
			 }
			 if(Schema::hasColumn('knp_vbusinessdetail', 'cinFilePath')){
			   $table->dropColumn("cinFilePath");
			 }
			 if(Schema::hasColumn('knp_vbusinessdetail', 'tanFilePath')){
			   $table->dropColumn("tanFilePath");
			 }
			  if(Schema::hasColumn('knp_vbusinessdetail', 'tanFile')){
			   $table->dropColumn("tanFile");
			 }
			 if(!Schema::hasColumn('knp_vbusinessdetail', 'gstProvisionalID')){
			  	$table->renameColumn("tanNumber","gstProvisionalID")->after("gstFilepath");
			 }	 
		
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
