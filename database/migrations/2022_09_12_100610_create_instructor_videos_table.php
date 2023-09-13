<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor_videos', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_id',30);
            $table->string('title',250)->nullable();
            $table->string('video_name',250)->nullable();
            $table->string('video_thumbnail',255)->nullable();
            $table->string('video_id',50)->nullable();
            $table->string('video_duration',30)->nullable();
            $table->string('status',11)->nullable()->comment('1=>active,0=>inactive');
            $table->softDeletes();
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
        Schema::dropIfExists('instructor_videos');
    }
}
