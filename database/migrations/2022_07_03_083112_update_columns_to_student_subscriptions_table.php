<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToStudentSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_subscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->change();
            $table->unsignedBigInteger('subscription_id')->nullable()->change();
            $table->foreign('student_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('subscription_id')->references('id')->on('subscription_plans')->nullOnDelete();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_subscriptions', function (Blueprint $table) {
            //
        });
    }
}
