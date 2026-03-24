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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('phone', 20)->nullable();
            $table->string('subject', 255);
            $table->longText('message');
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('set null');
            $table->enum('status', ['new', 'in_progress', 'closed'])->default('new')->index();
            $table->timestamps();

            // Indexes for queries
            $table->index('email');
            $table->index('product_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
