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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade');
            $table->foreignId('package_id')->constrained('pricing_packages')->onDelete('cascade');
            $table->string('transaction_id')->nullable();
            $table->string('payment_method');
            $table->string('paid_amount');
            $table->date('purchase_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->string('status');
            $table->boolean('currently_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
