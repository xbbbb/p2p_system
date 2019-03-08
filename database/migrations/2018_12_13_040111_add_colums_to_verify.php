<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToVerify extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('verifications', function (Blueprint $table) {
            $table->dropColumn("employ_check");
            $table->unsignedInteger("landlord")->nullable();
            $table->unsignedInteger("employ_google")->nullable();
            $table->unsignedInteger("employ_name")->nullable();
            $table->unsignedInteger("employ_address")->nullable();
            $table->unsignedInteger("employ_phone")->nullable();
            $table->unsignedInteger("income")->nullable();
            $table->unsignedInteger("expense")->nullable();
            $table->unsignedInteger("dishonor")->nullable();
            $table->unsignedInteger("high_risk")->nullable();
            $table->unsignedInteger("large_debit")->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('verifications', function (Blueprint $table) {
            //
        });
    }
}
