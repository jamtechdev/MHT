<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToLoginDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('login_details', function (Blueprint $table) {
            //
            $table->date('email_send_date')->nullable()->after('login_date');
            $table->string('email_reminder_flag')->nullable()->after('email_send_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('login_details', function (Blueprint $table) {
            //
        });
    }
}
