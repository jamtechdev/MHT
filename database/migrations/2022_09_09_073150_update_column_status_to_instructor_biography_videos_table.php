<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnStatusToInstructorBiographyVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructor_biography_videos', function (Blueprint $table) {
            $table->string('status',11)->nullable()->comment('1=>active,0=>inactive')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructor_biography_videos', function (Blueprint $table) {
            //
        });
    }
}
