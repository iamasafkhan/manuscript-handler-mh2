<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsAuthorCopyrightTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_author_copyright', function (Blueprint $table) {

            $table->id();
            $table->string('pdffile');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_author_copyright');
    }
}
