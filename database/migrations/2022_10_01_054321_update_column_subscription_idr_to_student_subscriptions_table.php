<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnSubscriptionIdrToStudentSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_subscriptions', function (Blueprint $table) {
            $table->string('plan_subscription_id')->nullable()->after('subscription_id');
            $table->string('status')->nullable()->after('plan_subscription_id');
            $table->string('canceled_at')->nullable()->after('status');
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
