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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_id')->unsigned();
            $table->bigInteger('owner_user_id')->unsigned();
            $table->string('name');
            $table->string('description')->nullable()->default('');
            $table->string('location')->nullable()->default('');
            $table->boolean('isActive')->default(false);
            $table->timestamps();


            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('owner_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
};
