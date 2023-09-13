<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnDisputeFlag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_subscriptions', function (Blueprint $table) {
            $table->string('dispute_flag','11')->nullable()->comment("1=>yes,0=no")->after('subscription_end_date');
            $table->string('dispute_id','255')->nullable()->after('dispute_flag');
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
