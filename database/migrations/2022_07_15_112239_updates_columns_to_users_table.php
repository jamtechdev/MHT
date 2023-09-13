<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatesColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_time_on_third_step',11)->default(NULL)->after('accept_bronze_plan')->comment('1=>Yes,2=>No');
            $table->string('first_time_on_fourth_step',11)->default(NULL)->after('first_time_on_third_step')->comment('1=>Yes,2=>No');
            $table->string('first_time_on_fifth_step',11)->default(NULL)->after('first_time_on_fourth_step')->comment('1=>Yes,2=>No');
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
            //
        });
    }
}
