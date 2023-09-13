<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToInstructorCourseLessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructor_course_lessions', function (Blueprint $table) {
            $table->unsignedBigInteger('instructor_id')->nullable()->change();
            $table->unsignedBigInteger('instructor_course_id')->nullable()->change();
            $table->foreign('instructor_id')->references('id')->on('instructors')->nullOnDelete();
            $table->foreign('instructor_course_id')->references('id')->on('instructor_courses')->nullOnDelete();
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
            $table->integer('instructor_id')->default(0)->change();
            $table->integer('instructor_course_id')->default(0)->change();
        });
    }
}
