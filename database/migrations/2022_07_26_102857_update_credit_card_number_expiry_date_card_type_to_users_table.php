<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCreditCardNumberExpiryDateCardTypeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('credit_card_number','255')->nullable()->after('password');
            $table->string('credit_card_expiry_date','11')->nullable()->after('credit_card_number');
            $table->string('credit_card_type','11')->nullable()->after('credit_card_expiry_date');
            
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
            //
        });
    }
}
