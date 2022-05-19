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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable;
            $table->string('banner_image')->nullable;
            $table->string('thumbnail_image')->nullable;
            $table->boolean('frontpage')->nullable;
            $table->datetime('starts_at')->nullable;
            $table->datetime('ends_at')->nullable;
            $table->string('location')->nullable()->default('');
            $table->integer('round1_active')->default(1);
            $table->time('round1_start_time')->nullable();
            $table->time('round1_end_time')->nullable();
            $table->integer('round2_active')->default(1);
            $table->time('round2_start_time')->nullable();
            $table->time('round2_end_time')->nullable();
            $table->integer('round3_active')->default(1);
            $table->time('round3_start_time')->nullable();
            $table->time('round3_end_time')->nullable();
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
