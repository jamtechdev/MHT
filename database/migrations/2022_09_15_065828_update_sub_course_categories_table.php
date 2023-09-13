<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSubCourseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_course_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('main_category_id')->nullable()->change();
            $table->foreign('main_category_id')->references('id')->on('course_categories')->nullOnDelete();
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
