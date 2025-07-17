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
        Schema::create('fund_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parish_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('fund_category_id')->constrained('contribution_categories')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_submissions');
    }
};
