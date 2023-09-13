<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorBiographyVideosTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('instructor_biography_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->foreign('instructor_id')->references('id')->on('instructors')->nullOnDelete();
            $table->string('title', 50)->nullable();
            $table->string('video_name')->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->string('video_id', 50)->nullable();
            $table->string('video_duration', 30)->nullable();
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
        Schema::dropIfExists('instructor_biography_videos');
    }
}