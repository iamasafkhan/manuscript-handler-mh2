<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsManuscriptreviewsTable extends Migration
{
	public function up()
	{
		Schema::create('mh_sms_manuscriptreviews', function (Blueprint $table) {

			$table->id();
			$table->unsignedBigInteger('userID');
			$table->unsignedBigInteger('reviewerID');
			$table->integer('editorType');
			$table->unsignedBigInteger('editorID');
			$table->unsignedBigInteger('journalID');
			$table->integer('pa_originality')->nullable();
			$table->integer('pa_abstract')->nullable();
			$table->integer('pa_introduction')->nullable();
			$table->integer('pa_description')->nullable();
			$table->integer('pa_measures_used')->nullable();
			$table->integer('pa_design_study')->nullable();
			$table->integer('pa_asmethods')->nullable();
			$table->integer('pa_presentation_text')->nullable();
			$table->integer('pa_presentation_tblfig')->nullable();
			$table->integer('pa_weaknesses')->nullable();
			$table->integer('pa_extrapolation')->nullable();
			$table->integer('pa_readability')->nullable();
			$table->integer('pa_overall_advice')->nullable();
			$table->integer('pa_ReadabilityUnderstandability')->nullable();
			$table->integer('pa_grasp')->nullable();
			$table->integer('pa_supportingref')->nullable();
			$table->integer('pa_presentation_argument')->nullable();
			$table->integer('pa_strength_calculation')->nullable();
			$table->integer('pa_overall_discussion')->nullable();
			$table->integer('pa_relevance_imp')->nullable();
			$table->integer('pa_publishability')->nullable();
			$table->string('recommendation');
			$table->text('confidential_comments');
			$table->text('comments_editor');
			$table->string('review_revision');
			$table->string('uploadfile');
			$table->string('uploadfile1');
			$table->string('uploadfile2');
			$table->string('uploadfile3');
			$table->string('uploadfile4');
			$table->tinyInteger('saveasdraft');
			$table->tinyInteger('approve_submission');
			$table->string('orderNumber');
			$table->datetime('entryDate');


			$table->foreign('userID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
			$table->foreign('reviewerID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
			$table->foreign('editorID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
			$table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
			
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_sms_manuscriptreviews');
	}
}
