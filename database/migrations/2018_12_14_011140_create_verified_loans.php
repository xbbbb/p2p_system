<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifiedLoans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verified_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("type");
            $table->unsignedInteger("verification_id");
            $table->foreign("verification_id")->references("id")->on("verifications");
            $table->string("lender");
            $table->string("monthly_amount");
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
        Schema::dropIfExists('verified_loans');
    }
}
