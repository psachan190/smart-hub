<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
      Schema::create("products",function(Blueprint $table){
	        $table->increments('id');
            $table->string('knp_shopcategory_id',10);
			$table->string("category_id",10)->nullable();
			$table->string("subcategory_id",10)->nullable();
			$table->string("vendordetails_id",20);
			$table->string("users_id");
			$table->string("user_email");
			$table->string('pName')->nullable();
			$table->string("price",20)->nullable();
			$table->string("salePrice",20)->nullable();
			$table->string("quantity",20)->nullable();
			$table->string("stockQuantity",50)->nullbale();
			$table->string("pImage",100)->nullable();
			$table->longText("pDesription")->nullable();
			$table->longText("plongDesription")->nullable();
			$table->longText("pdetailDescription")->nullable();
			$table->longText("pMetakeyWords")->nullable();
			$table->longText("pMetaDetails")->nullable();
			$table->char("pStatus",2)->nullable();
			$table->string('trash',3)->nullable();
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
