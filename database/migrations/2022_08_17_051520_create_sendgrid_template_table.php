<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendgridTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sendgrid_templates', function (Blueprint $table) {
            $table->id();
            $table->string('template_name','255')->nullable();
            $table->string('template_id','255')->nullable();
            $table->string('description','255')->nullable();
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
        Schema::dropIfExists('sendgrid_template');
    }
}
