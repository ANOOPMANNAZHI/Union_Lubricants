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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');
            $table->string('name', 255)->unique();
            $table->string('slug', 255)->unique()->index();
            $table->string('code', 100)->unique()->index();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('viscosity_grade', 50)->nullable();
            $table->longText('specifications')->nullable();
            $table->longText('applications')->nullable();
            $table->json('pack_sizes')->nullable();
            $table->string('image_path', 500)->nullable();
            $table->string('tds_pdf', 500)->nullable();
            $table->string('msds_pdf', 500)->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->timestamps();

            // Indexes for queries
            $table->index('category_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
