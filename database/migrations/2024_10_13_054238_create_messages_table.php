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
            Schema::create('messages', function (Blueprint $table) {
                $table->id('id_message');
                $table->dateTime('event_date');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->unsignedBigInteger('category_id');
                $table->unsignedBigInteger('agency_id');
                $table->string('name');
                $table->string('title');
                $table->text('report');
                $table->string('email')->nullable();
                $table->string('photo', 512)->nullable();
                $table->string('code')->unique();
                $table->enum('status', ['pending', 'proses', 'done']);
                $table->timestamp('report_timestamp')->useCurrent();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('user_accounts')->onDelete('set null');
                $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};