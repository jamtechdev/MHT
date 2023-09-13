<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->default(0);
            $table->string('card_number')->nullable();
            $table->string('brand')->nullable();
            $table->string('exp_month')->nullable();
            $table->string('exp_year')->nullable();
            $table->string('type')->default('card');
            $table->tinyInteger('default_method')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
}
