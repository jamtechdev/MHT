<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToInstructorCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructor_courses', function (Blueprint $table) {
            $table->unsignedBigInteger('instructor_id')->nullable()->change();
            $table->unsignedBigInteger('course_category_id')->nullable()->change();
            $table->unsignedBigInteger('discipline_id')->nullable()->change();
            $table->foreign('instructor_id')->references('id')->on('instructors')->nullOnDelete();
            $table->foreign('course_category_id')->references('id')->on('course_categories')->nullOnDelete();
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
        Schema::table('instructor_courses', function (Blueprint $table) {
            $table->integer('instructor_id')->default(0)->change();
            $table->integer('course_category_id')->default(0)->change();
            $table->integer('discipline_id')->default(0)->change();
        });
    }
}
