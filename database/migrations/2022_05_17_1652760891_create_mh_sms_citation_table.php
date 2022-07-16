<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsCitationTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_citation', function (Blueprint $table) {

            $table->id();
            $table->tinyText('orderNumber');
            $table->tinyText('citationLink');
            $table->text('citationDescription');
            $table->datetime('entryDate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_citation');
    }
}
