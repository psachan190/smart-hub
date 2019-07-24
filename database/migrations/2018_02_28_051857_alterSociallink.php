<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSociallink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("vendordetails",function($table){
          $table->Text('facebookLink')->after('categoryType')->nullable();
          $table->Text("twitterLinks")->after("categoryType")->nullable();
          $table->Text("googlePlusLinks")->after("categoryType")->nullable();
          $table->string("infoEmail",50)->after("categoryType")->nullable();
          $table->string("secondinfoEmail",50)->after("categoryType")->nullable();
          $table->Text("linkedInLinks")->after("categoryType")->nullable();
          $table->Text("instagramLinks")->after("categoryType")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendordetails', function($table) {
          $table->dropColumn('facebookLink');
          $table->dropColumn("twitterLinks");
          $table->dropColumn("googlePlusLinks");
          $table->dropColumn("infoEmail",50);
          $table->dropColumn("secondinfoEmail",50);
          $table->dropColumn("linkedInLinks");
          $table->dropColumn("instagramLinks");
       });
    }
}
