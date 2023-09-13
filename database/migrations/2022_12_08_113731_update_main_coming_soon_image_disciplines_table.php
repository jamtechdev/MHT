<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMainComingSoonImageDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disciplines', function (Blueprint $table) {
            $table->string('main_coming_soon_image')->nullable()->after('photo');
            $table->string('video_coming_soon_image')->nullable()->after('main_coming_soon_image');
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
