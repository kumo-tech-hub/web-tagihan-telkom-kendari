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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string("company_name");
            $table->string("phone_number");
            $table->string("address")->nullable();
            $table->string("city")->nullable();
            $table->string("district")->nullable();
            $table->string("email")->unique();
            $table->string("type");
            $table->boolean("status")->default(true);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
