<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhNewsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_news', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('entry_by');
            $table->date('modified_date');
            $table->date('modified_by');
            $table->date('entry_date');
            $table->char('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_news');
    }
}
