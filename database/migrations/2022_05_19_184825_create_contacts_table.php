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
            $table->string('roepnaam')->nullable();
            $table->string('tussenvoegsel')->nullable();
            $table->string('achternaam')->nullable();
            $table->string('email')->nullable();
            $table->boolean('op_mailinglijst')->default(false);
            $table->string('activiteit_titel')->nullable();
            $table->string('edities_meegedaan')->nullable();
            $table->string('mobiel')->nullable();
            $table->string('organisatie')->nullable();
            $table->text('notities')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('last_edited_by')->nullable();
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
        Schema::dropIfExists('contacts');
    }
};
