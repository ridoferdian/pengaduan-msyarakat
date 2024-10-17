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
        Schema::create('response_instansis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_message');
            $table->dateTime('response_date');
            $table->text('response');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_message')->references('id_message')->on('messages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('user_accounts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('response_instansis');
    }
};