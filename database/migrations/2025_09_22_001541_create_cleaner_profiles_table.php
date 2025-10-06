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
        Schema::create('cleaner_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('bio')->nullable();
            $table->string('service_area')->nullable();
            $table->decimal('hourly_rate', 8, 2)->default(0.00);
            $table->unsignedTinyInteger('experience_years')->default(0);
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cleaner_profiles');
    }
};
