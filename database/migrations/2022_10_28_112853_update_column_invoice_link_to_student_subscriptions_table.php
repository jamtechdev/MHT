<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnInvoiceLinkToStudentSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_subscriptions', function (Blueprint $table) {
            $table->string('receipt_url',255)->nullable()->after('price');
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
