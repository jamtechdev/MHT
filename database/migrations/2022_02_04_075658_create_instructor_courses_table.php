<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorCoursesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('instructor_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('instructor_id')->default(0);
            $table->integer('course_category_id')->default(0);
            $table->integer('discipline_id')->default(0);
            $table->string('name', 50)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('instructor_courses');
    }
}