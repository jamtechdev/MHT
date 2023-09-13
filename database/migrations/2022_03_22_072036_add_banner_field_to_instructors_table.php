<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannerFieldToInstructorsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->string('banner')->nullable()->after('photo');
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
            $table->dropColumn('banner');
        });
    }
}