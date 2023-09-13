<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCourseidsColumnToInstructorVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructor_videos', function (Blueprint $table) {
            $table->string('main_course_category_id')->nullable()->after('instructor_id');
            $table->string('sub_course_category_id')->nullable()->after('main_course_category_id');
            $table->string('discipline_id')->nullable()->after('sub_course_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructor_videos', function (Blueprint $table) {
            //
        });
    }
}
