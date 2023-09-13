<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorCourseLessionsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('instructor_course_lessions', function (Blueprint $table) {
            $table->id();
            $table->integer('instructor_id')->default(0);
            $table->integer('instructor_course_id')->default(0);
            $table->string('title', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('lession_thumbnail')->nullable();
            $table->string('lession_video_path')->nullable();
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
        Schema::dropIfExists('instructor_course_lessions');
    }
}