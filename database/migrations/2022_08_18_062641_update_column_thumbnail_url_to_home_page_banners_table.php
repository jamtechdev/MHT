<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnThumbnailUrlToHomePageBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_page_banners', function (Blueprint $table) {
            $table->string('thumbnailUrl','255')->nullable()->after('banner_id');
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
