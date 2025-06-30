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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('cover')->nullable();
            $table->decimal('price')->default(0);
            $table->text('description');
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('size')->default(0); // hint: e.g., in square feet/meters
            $table->integer('floor')->default(0);
            $table->integer('garage')->nullable();
            $table->integer('balcony')->nullable();
            $table->string('status')->default('rent');
            $table->string('address');
            $table->date('built_year')->nullable();
            $table->string('location_map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
