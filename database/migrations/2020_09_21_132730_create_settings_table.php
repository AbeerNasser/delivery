<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instgram_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('twitter_link')->nullable();
            // mutivalues 
            // $table->string('email');
            // $table->string('phone');

            
            // $table->integer('payment_type')->default(0)->comment('1-stripe/card, 2 - Paypal, 3 - Offline');
            //$table->integer('status')->default(0)->comment('0 - in progress, 1 - Completed');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
