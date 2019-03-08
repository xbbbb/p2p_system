<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCateToApp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string("cate")->default("SACC");
           // $table->string("id_img")->nullable();
           // $table->string("car_photo")->nullable();
           // $table->string("certification")->nullable();
           // $table->string("doc_with_address")->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn("cate");
            //$table->dropColumn("id_img");
            //$table->dropColumn("car_photo");
            //$table->dropColumn("certification");
            //$table->dropColumn("doc_with_address");

        });
    }
}
