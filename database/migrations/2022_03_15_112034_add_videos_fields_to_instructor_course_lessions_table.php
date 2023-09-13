<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideosFieldsToInstructorCourseLessionsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('instructor_course_lessions', function (Blueprint $table) {
            $table->string('video_duration', 30)->nullable()->after('lession_video_path');
            $table->string('video_name')->nullable()->after('video_duration');
            $table->string('video_id', 50)->nullable()->after('video_name');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('instructor_course_lessions', function (Blueprint $table) {
            $table->dropColumn('video_duration');
            $table->dropColumn('video_name');
            $table->dropColumn('video_id');
        });
    }
}