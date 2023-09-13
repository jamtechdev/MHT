<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInstructorClassesVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructor_classes_videos', function (Blueprint $table) {
            $table->unsignedBigInteger('instructor_id')->nullable()->change();
            $table->foreign('instructor_id')->references('id')->on('instructors')->nullOnDelete();
            $table->unsignedBigInteger('video_id')->nullable()->change();
            $table->foreign('video_id')->references('id')->on('instructor_videos')->nullOnDelete();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
