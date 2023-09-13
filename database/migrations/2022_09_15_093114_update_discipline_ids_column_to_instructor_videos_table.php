<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDisciplineIdsColumnToInstructorVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructor_videos', function (Blueprint $table) {
            $table->unsignedBigInteger('main_course_category_id')->nullable()->change();
            $table->foreign('main_course_category_id')->references('id')->on('course_categories')->nullOnDelete();
            $table->unsignedBigInteger('sub_course_category_id')->nullable()->change();
            $table->foreign('sub_course_category_id')->references('id')->on('sub_course_categories')->nullOnDelete();
            $table->unsignedBigInteger('discipline_id')->nullable()->change();
            $table->foreign('discipline_id')->references('id')->on('disciplines')->nullOnDelete();
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
