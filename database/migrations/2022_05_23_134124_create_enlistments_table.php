<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlistments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_id')->unsigned();
            $table->bigInteger('activity_id')->unsigned();
            $table->bigInteger('round_id')->unsigned()->default(3);
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('round_id')->references('id')->on('eventrounds');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enlistments');
    }
};
