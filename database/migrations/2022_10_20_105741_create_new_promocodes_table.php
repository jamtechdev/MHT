<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewPromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_promocodes', function (Blueprint $table) {
            $table->id();
            $table->string('promocode')->nullable();
            $table->string('price_type')->comment("1:percentage,2:amount")->default(0);
            $table->string('value',255)->nullable();
            $table->string('promocode_id',255)->nullable();
            $table->string('redeem_count')->nullable();
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
        Schema::dropIfExists('new_promocodes');
    }
}
