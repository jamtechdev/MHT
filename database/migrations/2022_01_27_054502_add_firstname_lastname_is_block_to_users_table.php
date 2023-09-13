<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFirstnameLastnameIsBlockToUsersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname', 100)->nullable()->after('name');
            $table->string('lastname', 100)->nullable()->after('firstname');
            $table->tinyInteger('is_block')->default(0)->after('facebook_id');
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
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('is_block');
        });
    }
}