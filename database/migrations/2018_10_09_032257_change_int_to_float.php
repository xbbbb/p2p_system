<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIntToFloat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repayments', function (Blueprint $table) {
           $table->dropColumn('amount');
           $table->dropColumn('paid_amount');
           //$table->float('amount');
           //->float('paid_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repayments', function (Blueprint $table) {
            //
        });
    }
}
