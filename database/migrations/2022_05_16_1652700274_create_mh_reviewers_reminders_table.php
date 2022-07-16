<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhReviewersRemindersTable extends Migration
{
	public function up()
	{
		Schema::create('mh_reviewers_reminders', function (Blueprint $table) {

			$table->id();
			$table->integer('recordID');
			$table->integer('journalID');
			$table->unsignedBigInteger('editorID');
			$table->string('editorEmailAddress');
			$table->integer('reviewerID');
			$table->string('reviewerEmailAddress');
			$table->string('orderNumber');
			$table->date('dateone');
			$table->date('datetwo');
			$table->tinyInteger('dateonesend');
			$table->tinyInteger('datetwosend');
			$table->datetime('entryDate');
			$table->tinyInteger('emailsend');
			$table->datetime('sendingDate');
			$table->foreign('editorID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_reviewers_reminders');
	}
}
