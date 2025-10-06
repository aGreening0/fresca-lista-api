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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('customer_id')->constrained('users')->cascadeOnDelete();
//            $table->foreignId('customer_profile_id')->constrained()->cascadeOnDelete();
//            $table->foreignId('customer_location_id')->constrained()->cascadeOnDelete();
//            $table->foreignId('cleaner_id')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('scheduled_at');
            $table->enum('status', ['pending','accepted','in_progress','completed','cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
