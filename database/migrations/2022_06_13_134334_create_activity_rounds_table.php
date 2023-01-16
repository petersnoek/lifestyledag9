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
        Schema::create('activity_rounds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('activity_id')->unsigned();
            $table->bigInteger('eventround_id')->unsigned();
            $table->unsignedInteger('max_participants')->default(1);
            $table->timestamps();

            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('eventround_id')->references('id')->on('eventrounds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_rounds');
    }
};
