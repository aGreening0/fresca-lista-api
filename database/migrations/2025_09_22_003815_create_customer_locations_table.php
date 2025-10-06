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
        Schema::create('customer_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_profile_id')->constrained()->cascadeOnDelete();
            $table->string('label', 100)->default('Home');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city', 100);
            $table->string('postcode', 20);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->integer('square_feet')->nullable();
            $table->tinyInteger('bedrooms')->nullable();
            $table->tinyInteger('bathrooms')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_locations');
    }
};
