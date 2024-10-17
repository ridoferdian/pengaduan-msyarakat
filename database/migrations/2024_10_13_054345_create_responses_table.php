<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id('id_response');
            $table->unsignedBigInteger('id_message');
            $table->dateTime('response_date');
            $table->text('response');
            $table->unsignedBigInteger('id_officer');
            $table->timestamps();

            $table->foreign('id_message')->references('id_message')->on('messages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_officer')->references('id_officer')->on('officers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};