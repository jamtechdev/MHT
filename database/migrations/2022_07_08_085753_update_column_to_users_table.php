<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('is_first_time_user',11)->default(NULL)->after('email_verify_reminder')->comment('1=>First time user,2=>Not first time user');
            $table->string('accept_bronze_plan',11)->default(NULL)->after('is_first_time_user')->comment('1=>Accepted,2=>Not Accepted');
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
