<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhMissingInvitationsTable extends Migration
{
	public function up()
	{
		Schema::create('mh_missing_invitations', function (Blueprint $table) {

			$table->id();
			$table->integer('invRecordID');
			$table->integer('journalID');
			$table->integer('editorID');
			$table->string('editorEmailAddress');
			$table->integer('reviewerID');
			$table->string('reviewerEmailAddress');
			$table->string('orderNumber');
			$table->date('deadlineDate');
			$table->datetime('entryDate');
			$table->tinyInteger('status');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_missing_invitations');
	}
}
