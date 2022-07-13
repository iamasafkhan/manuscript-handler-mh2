<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhReviewersFirstReminderTable extends Migration
{
    public function up()
    {
        Schema::create('mh_reviewers_firstReminder', function (Blueprint $table) {

            $table->id();
            $table->integer('recordID');
            $table->string('orderNumber');
            $table->unsignedBigInteger('journalID');
            $table->unsignedBigInteger('editorID');
            $table->string('editorEmailAddress');
            $table->unsignedBigInteger('reviewerID');
            $table->string('reviewerEmailAddress');
            $table->date('reminderDate');
            $table->tinyInteger('emailSent');
            $table->datetime('entryDate');
            $table->datetime('sentDate');
            $table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
            $table->foreign('editorID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
            $table->foreign('reviewerID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_reviewers_firstReminder');
    }
}
