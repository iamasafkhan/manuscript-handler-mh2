<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhSmsReqReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_sms_req_reviews', function (Blueprint $table) {

            $table->id();

            $table->integer('required_rev');
            $table->string('orderNumber');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_sms_req_reviews');
    }
}
