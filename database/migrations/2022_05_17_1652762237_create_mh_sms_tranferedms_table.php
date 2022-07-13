<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsTranferedmsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_tranferedms', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('fromJournalID');
            $table->unsignedBigInteger('toJournalID');
            $table->unsignedBigInteger('oldUserID');
            $table->unsignedBigInteger('newUserID');
            $table->string('orderNumber');
            $table->datetime('entryDate');

            $table->foreign('fromJournalID')->references('id')->on('mh_journals')->onDelete('cascade');
            $table->foreign('toJournalID')->references('id')->on('mh_journals')->onDelete('cascade');
            $table->foreign('oldUserID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
            $table->foreign('newUserID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
           
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_tranferedms');
    }
}
