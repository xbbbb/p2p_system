<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToTasks extends Migration
{

    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedInteger("type");
            $table->unsignedInteger("complete")->default(0);//
        });
    }


    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn("type");
            $table->dropColumn("complete");//
        });
    }
}
