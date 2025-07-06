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
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // Kolom ID (auto-increment)
            $table->string(column: 'company_name');
            $table->string('company_type')->nullable();
            $table->string('address')->nullable(); // Boleh kosong
            $table->string('email')->nullable()->unique(); // Boleh kosong dan harus unik
            $table->string('contact_person_name');
            $table->string('contact_person_phone')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};