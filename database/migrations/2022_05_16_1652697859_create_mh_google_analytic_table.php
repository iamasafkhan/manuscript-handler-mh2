<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhGoogleAnalyticTable extends Migration
{
    public function up()
    {
        Schema::create('mh_google_analytic', function (Blueprint $table) {

            $table->id();
            $table->text('analytic_code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_google_analytic');
    }
}
