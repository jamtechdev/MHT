<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnStatusToHomePageBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_page_banners', function (Blueprint $table) {
            $table->string('status','11')->nullable()->comment('1=>active,0=>inactive')->after('banner_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_page_banners', function (Blueprint $table) {
            //
        });
    }
}
