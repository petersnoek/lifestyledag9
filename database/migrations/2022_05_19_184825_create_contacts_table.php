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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('surname')->default('');
            $table->string('lastname');
            $table->string('email');
            $table->boolean('on_mailinglist')->default(false);
            $table->string('mobiel')->nullable()->default(null);
            $table->string('organisation');
            $table->bigInteger('user_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('last_edited_by')->unsigned()->nullable()->default(null);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('last_edited_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
