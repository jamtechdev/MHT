<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRecommendedFlagColumnToInstructorVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructor_videos', function (Blueprint $table) {
            $table->string('recommended_flag', 11)->nullable()->comment('1=>Recommnded,0=>Not Recommnded')->after('discipline_id');
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
