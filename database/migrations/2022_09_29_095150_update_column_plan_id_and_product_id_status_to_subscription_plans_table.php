<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnPlanIdAndProductIdStatusToSubscriptionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->string('plan_id',255)->nullable()->after('status');
            $table->string('product_id',255)->nullable()->after('plan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_plans', function (Blueprint $table) {
            //
        });
    }
}
