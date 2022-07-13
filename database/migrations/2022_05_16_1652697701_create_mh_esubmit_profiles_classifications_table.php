<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhEsubmitProfilesClassificationsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_esubmit_profiles_classifications', function (Blueprint $table) {

            $table->id();
            $table->integer('profileID');
            $table->integer('classifyID');
            $table->datetime('entryDate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_esubmit_profiles_classifications');
    }
}
