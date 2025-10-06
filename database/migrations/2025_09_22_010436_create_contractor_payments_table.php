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
        Schema::create('contractor_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $table->foreignId('cleaner_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('amount', 8, 2);
            $table->decimal('platform_fee', 8, 2)->default(0.00);
            $table->enum('status', ['pending','scheduled','paid','failed'])->default('pending');
            $table->enum('method', ['bank_transfer','paypal','manual'])->default('bank_transfer');
            $table->string('transaction_id')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractor_payments');
    }
};
