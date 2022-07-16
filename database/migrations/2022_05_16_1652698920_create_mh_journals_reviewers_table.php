<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhJournalsReviewersTable extends Migration
{
	public function up()
	{
		Schema::create('mh_journals_reviewers', function (Blueprint $table) {

			$table->id();
			$table->integer('journalID');
			$table->string('username');
			$table->string('password');
			$table->string('salutation')->nullable();
			$table->string('first_name');
			$table->string('middle_name')->nullable();
			$table->string('last_name');
			$table->string('suffix')->nullable();
			$table->string('initials',)->nullable();
			$table->string('email');
			$table->string('url')->nullable();
			$table->string('phone')->nullable();
			$table->string('mailing_address')->nullable();
			$table->string('billing_address')->nullable();
			$table->string('country')->nullable();
			$table->string('locales')->nullable();
			$table->datetime('date_last_email')->nullable();
			$table->datetime('date_registered');
			$table->datetime('date_validated')->nullable();
			$table->datetime('date_last_login');
			$table->tinyInteger('must_change_password')->nullable();
			$table->bigInteger('auth_id')->nullable();
			$table->string('auth_str')->nullable();
			$table->tinyInteger('disabled')->default('0');
			$table->text('disabled_reason');
			$table->tinyInteger('inline_help')->nullable();
			$table->text('gossip');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_journals_reviewers');
	}
}
