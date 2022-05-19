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
            $table->foreignId('event_id');
            $table->string('executed_by');
            $table->string('name');
            $table->string('description')->nullable()->default('');
            $table->string('banner_image')->nullable()->default('');
            $table->string('thumbnail_image')->nullable()->default('');
            $table->string('location')->nullable()->default('');

            $table->unsignedInteger('round1_max_participants')->nullable()->default(10);
            $table->unsignedInteger('round2_max_participants')->nullable()->default(10);
            $table->unsignedInteger('round3_max_participants')->nullable()->default(10);

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
        //
    }
};
