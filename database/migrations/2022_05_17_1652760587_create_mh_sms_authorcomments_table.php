<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsAuthorcommentsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_authorcomments', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('editorialID');
            $table->unsignedBigInteger('journalID');
            $table->text('comments');
            $table->string('orderNumber');
            $table->datetime('entryDate');
            $table->foreign('editorialID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
            $table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
           
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_authorcomments');
    }
}
