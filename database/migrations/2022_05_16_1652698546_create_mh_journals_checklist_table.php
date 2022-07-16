<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhJournalsChecklistTable extends Migration
{
    public function up()
    {
        Schema::create('mh_journals_checklist', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('journalID');
            $table->text('description');
            $table->datetime('entryDate');
            $table->tinyInteger('status')->default('1');
            $table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_journals_checklist');
    }
}
