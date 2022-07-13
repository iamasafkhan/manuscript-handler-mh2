<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhEsubmitManuscriptstatusTable extends Migration
{
    public function up()
    {
        Schema::create('mh_esubmit_manuscriptstatus', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_esubmit_manuscriptstatus');
    }
}
