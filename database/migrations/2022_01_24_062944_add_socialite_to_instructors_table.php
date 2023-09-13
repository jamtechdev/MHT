<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialiteToInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->string('google_id')->nullable()->after('teaching_experience');
            $table->string('facebook_id')->nullable()->after('google_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->dropColumn('google_id');
            $table->dropColumn('facebook_id');
        });
    }
}