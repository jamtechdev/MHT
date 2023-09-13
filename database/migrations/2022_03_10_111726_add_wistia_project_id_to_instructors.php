<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWistiaProjectIdToInstructors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->string('wistia_project_id', 50)->nullable()->after('facebook_id');
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
            $table->dropColumn('wistia_project_id');
        });
    }
}
