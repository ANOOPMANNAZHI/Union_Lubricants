<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Disable foreign key constraints temporarily
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Back up existing brands data
        $existingBrands = DB::table('brands')->get();

        // Drop the incomplete table if it exists
        Schema::dropIfExists('brands');

        // Create the complete brands table
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->index();
            $table->text('description')->nullable();
            $table->string('logo_path')->nullable();
            $table->timestamps();
        });

        // Restore backed up data
        foreach ($existingBrands as $brand) {
            DB::table('brands')->insert((array)$brand);
        }

        // Re-enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
