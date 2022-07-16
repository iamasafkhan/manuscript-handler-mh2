<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsEofficedocsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_eofficedocs', function (Blueprint $table) {

            $table->id();
            $table->string('orderNumber');
            $table->string('fileName');
            $table->string('filePath');
            $table->datetime('entryDate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_eofficedocs');
    }
}
