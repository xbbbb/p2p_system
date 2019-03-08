<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('application_id');
            $table->foreign("application_id")->references("id")->on("applications");
            $table->unsignedInteger('salary')->nullable();
            $table->unsignedInteger('benefits')->nullable();
            $table->string("ID_one")->nullable();
            $table->string("ID_two")->nullable();
            $table->string("address_one")->nullable();
            $table->string("address_two")->nullable();
            $table->string("DOB_one")->nullable();
            $table->string("DOB_two")->nullable();
            $table->string("payslip")->default(0);
            $table->string("employ_check")->default(0);
            $table->string("employ_note")->nullable();
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
        Schema::dropIfExists('verifications');
    }
}
