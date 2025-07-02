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
        Schema::create('contract', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customer')->onDelete('restrict');
            $table->foreignId('account_manager_id')->constrained('account_manager')->onDelete('restrict');
            $table->foreignId('product_id')->constrained('produk')->onDelete('restrict');
            $table->string("no_surat")->unique();
            $table->date("start_date");
            $table->date("end_date");
            $table->boolean("payment_status")->default(false);
            $table->string("payment_bank")->nullable();
            $table->string("bank_account_id")->nullable();
            $table->string("bank_account_name")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
