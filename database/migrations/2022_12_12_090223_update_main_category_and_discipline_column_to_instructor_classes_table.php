<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMainCategoryAndDisciplineColumnToInstructorClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructor_classes', function (Blueprint $table) {
            $table->string('main_category_id',255)->nullable()->after('class_name');
            $table->string('discipline_id',255)->nullable()->after('main_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructor_classes', function (Blueprint $table) {
            //
        });
    }
}
