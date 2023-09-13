<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRequestTypeToUsersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('request_type', 30)->nullable()->after('status');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('request_type');
        });
    }
}