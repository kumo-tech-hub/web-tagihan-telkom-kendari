<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('account_managers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->boolean('status')->default(true); // true = Aktif, false = Tidak Aktif
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('account_managers');
    }
};