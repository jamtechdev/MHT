<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClassIdForeighnKeyToInstructorClassesVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructor_classes_videos', function (Blueprint $table) {
            $table->unsignedBigInteger('class_id')->nullable()->change();
            $table->foreign('class_id')->references('id')->on('instructor_classes')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructor_classes_videos', function (Blueprint $table) {
            //
        });
    }
}
