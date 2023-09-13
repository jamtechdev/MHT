<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneAgeGroupGenderProfilePictureToUsersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 30)->nullable()->after('is_block');
            $table->string('age_group', 30)->nullable()->after('phone');
            $table->string('gender', 30)->nullable()->after('age_group');
            $table->string('profile_picture')->nullable()->after('gender');
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
            $table->dropColumn('phone');
            $table->dropColumn('age_group');
            $table->dropColumn('gender');
            $table->dropColumn('profile_picture');
        });
    }
}