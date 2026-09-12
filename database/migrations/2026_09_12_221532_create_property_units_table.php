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
        Schema::create('property_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();
            $table->string('name'); // e.g. Lumière Studio Suite
            $table->string('badge')->nullable(); // e.g. Studio Apartment
            $table->string('image_path'); // File path or external URL
            $table->text('description')->nullable();
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('floor_area')->nullable(); // in sqm
            $table->decimal('outright_price', 15, 2);
            $table->boolean('has_installment')->default(false);
            $table->integer('installment_duration')->nullable(); // e.g. 6 (months)
            $table->decimal('installment_total_price', 15, 2)->nullable();
            $table->decimal('installment_deposit_percent', 5, 2)->default(30);
            $table->decimal('installment_monthly_payment', 15, 2)->nullable();
            $table->json('hotspots')->nullable(); // JSON list of hotspot coordinates/descriptions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_units');
    }
};
