<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStudentForeignKeyToPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_details', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->change();
            $table->foreign('student_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_details', function (Blueprint $table) {
            //
        });
    }
}
