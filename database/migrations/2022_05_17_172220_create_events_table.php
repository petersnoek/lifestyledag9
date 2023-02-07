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
            $table->string('description')->nullable();
            $table->date('date')->nullable();
            $table->time('starts_at')->nullable();
            $table->time('ends_at')->nullable();
            $table->string('location')->nullable()->default('');
            $table->string('image')->nullable()->default(null);

            $table->datetime('enlist_starts_at')->nullable();
            $table->datetime('enlist_stops_at')->nullable();

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
        Schema::dropIfExists('events');
    }
};
