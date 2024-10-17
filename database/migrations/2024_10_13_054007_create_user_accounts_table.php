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
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('nik',16);
            $table->string('username');
            $table->string('email')->unique;
            $table->unsignedBigInteger('agency_id')->nullable();
            $table->string('password');
            $table->string('telp');
            $table->enum('role', ['user','super_admin', 'admin_agency']);
            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_accounts');
    }
};