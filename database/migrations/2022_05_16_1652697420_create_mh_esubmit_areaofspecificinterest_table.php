<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhEsubmitAreaofspecificinterestTable extends Migration
{
    public function up()
    {
        Schema::create('mh_esubmit_areaofspecificinterest', function (Blueprint $table) {

        $table->id();
		$table->unsignedBigInteger('journalID');
		$table->string('title');
		$table->integer('specialIssue');
		$table->datetime('entryDate');
		$table->tinyInteger('status');
        $table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_esubmit_areaofspecificinterest');
    }
}