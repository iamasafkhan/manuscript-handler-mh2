<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhManuscriptHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('mh_manuscript_history', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('orderNumber');
            $table->string('userType');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('journalID');
            $table->unsignedBigInteger('companyID');
            $table->string('manuscriptStatus');
            $table->string('historyDetails');
            $table->text('queryDetails');
            $table->string('pageURL');
            $table->string('ipAddress');
            $table->timestamp('entryDate');

            $table->foreign('userID')->references('id')->on('mh_esubmit_profiles')->onUpdate('cascade');
            $table->foreign('journalID')->references('id')->on('mh_journals')->onUpdate('cascade');
            $table->foreign('companyID')->references('id')->on('mh_companies')->onUpdate('cascade');
             $table->foreign('orderNumber')->references('orderNumber')->on('mh_sms_authorchecklist')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_manuscript_history');
    }
}
