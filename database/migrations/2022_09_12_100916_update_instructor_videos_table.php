<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInstructorVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructor_videos', function (Blueprint $table) {
            $table->unsignedBigInteger('instructor_id')->nullable()->change();
            $table->foreign('instructor_id')->references('id')->on('instructors')->nullOnDelete();
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
