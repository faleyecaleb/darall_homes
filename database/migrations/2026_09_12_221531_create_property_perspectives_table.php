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
        Schema::create('property_perspectives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();
            $table->string('perspective_key'); // e.g. 'front', 'left', 'right', 'back'
            $table->string('title'); // e.g. 'Front View'
            $table->string('subtitle')->nullable(); // e.g. 'Perspective I'
            $table->string('image_path'); // File path or external URL
            $table->text('description')->nullable(); // Detailed caption for lightbox
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_perspectives');
    }
};
