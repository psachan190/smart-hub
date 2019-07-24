<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
      {
          Schema::table('users', function($table) { 
             if(Schema::hasColumn('users', 'type_id')) //check whether users table has email column
            {
                $table->dropColumn('type_id');
            }

            if(Schema::hasColumn('users', 'address'))  //check whether users table has email column
            {
                $table->dropColumn('address');
            }
            if(Schema::hasColumn('users', 'city_id'))  //check whether users table has email column
            {
                $table->dropColumn('city_id');
            }
            if(Schema::hasColumn('users', 'aboutCompany'))  //check whether users table has email column
            {
                $table->dropColumn('aboutCompany');
            }
            if(Schema::hasColumn('users', 'keyFeature_text'))  //check whether users table has email column
            {
                $table->dropColumn('keyFeature_text');
            }
            if(Schema::hasColumn('users', 'companyName'))  //check whether users table has email column
            {
                $table->dropColumn('companyName');
            }
            if(Schema::hasColumn('users', 'companyAdress'))  //check whether users table has email column
            {
                $table->dropColumn('companyAdress');
            }
             if(Schema::hasColumn('users', 'companyCityid'))  //check whether users table has email column
            {
                $table->dropColumn('companyCityid');
            }
             if(Schema::hasColumn('users', 'companyPincode'))  //check whether users table has email column
            {
                $table->dropColumn('companyPincode');
            }
          });
      }

      public function down()
      {
          
      }
}
