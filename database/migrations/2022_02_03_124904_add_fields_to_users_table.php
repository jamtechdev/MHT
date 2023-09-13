<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('who_will_be_training')->nullable()->after('profile_picture');
            $table->string('disciplines_in_martial_arts')->nullable()->after('who_will_be_training');
            $table->string('stretching_flexibility_spiritual_meditative_arts')->nullable()->after('disciplines_in_martial_arts');
            $table->text('health_and_wellness_guidance')->nullable()->after('stretching_flexibility_spiritual_meditative_arts');
            $table->text('all_fitness_including')->nullable()->after('health_and_wellness_guidance');
            $table->string('fitness')->nullable()->after('all_fitness_including');
            $table->string('preferred_language')->nullable()->after('fitness');
            $table->string('instructor_gender', 50)->nullable()->after('preferred_language');
            $table->string('preferred_training_style', 50)->nullable()->after('instructor_gender');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('who_will_be_training');
            $table->dropColumn('disciplines_in_martial_arts');
            $table->dropColumn('stretching_flexibility_spiritual_meditative_arts');
            $table->dropColumn('health_and_wellness_guidance');
            $table->dropColumn('all_fitness_including');
            $table->dropColumn('fitness');
            $table->dropColumn('preferred_language');
            $table->dropColumn('instructor_gender');
            $table->dropColumn('preferred_training_style');
        });
    }
}