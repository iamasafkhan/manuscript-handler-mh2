<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhJournalsChecklistTextTable extends Migration
{
    public function up()
    {
        Schema::create('mh_journals_checklist_text', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('journalID');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_journals_checklist_text');
    }
}
