<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubscriptionToUsersTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('instructor_experience')->default(0)->after('customer_id');
            $table->tinyInteger('is_subscribe')->default(0)->after('instructor_experience');
            $table->string('subscription_id', 100)->nullable()->after('is_subscribe');
            $table->string('plan_id', 100)->nullable()->after('subscription_id');
            $table->string('plan_amount', 30)->nullable()->after('plan_id');
            $table->string('plan_amount_currency', 30)->nullable()->after('plan_amount');
            $table->string('plan_interval', 30)->nullable()->after('plan_amount_currency');
            $table->string('status', 30)->nullable()->after('plan_interval');
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
            $table->dropColumn('instructor_experience');
            $table->dropColumn('is_subscribe');
            $table->dropColumn('subscription_id');
            $table->dropColumn('plan_id');
            $table->dropColumn('plan_amount');
            $table->dropColumn('plan_amount_currency');
            $table->dropColumn('plan_interval');
            $table->dropColumn('status');
        });
    }
}