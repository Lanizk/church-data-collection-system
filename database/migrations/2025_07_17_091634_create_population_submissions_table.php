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
        Schema::create('population_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parish_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('population_category_id')->constrained('population_categories')->onDelete('cascade');
            $table->integer('count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('population_submissions');
    }
};
