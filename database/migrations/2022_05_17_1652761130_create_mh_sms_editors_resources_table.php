<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsEditorsResourcesTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_editors_resources', function (Blueprint $table) {

            $table->id();
            $table->string('pdffile');
            $table->string('youtubelink');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_editors_resources');
    }
}
