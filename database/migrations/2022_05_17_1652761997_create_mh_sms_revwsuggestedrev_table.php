<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsRevwsuggestedrevTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_revwsuggestedrev', function (Blueprint $table) {

            $table->id();

		$table->unsignedBigInteger('userID');
		$table->integer('manuscriptID');
		$table->string('recommendingName');
		$table->string('recommendingEmail');
		$table->string('recommendingExperties');
		$table->string('recommendingAffiliation');
		$table->text('commentsToEditor');
		$table->datetime('entryDate');
		$table->string('orderNumber');

        $table->foreign('userID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
        $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_revwsuggestedrev');
    }
}
