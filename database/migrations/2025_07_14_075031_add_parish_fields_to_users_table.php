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
        Schema::table('users', function (Blueprint $table) {
            $table->string('parish_number')->unique()->nullable();
            $table->string('telephone')->nullable();
            $table->unsignedBigInteger('created_by')->nullable(); 
             $table->softDeletes(); 
          

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropForeign(['created_by']);

        
             $table->dropColumn(['parish_number', 'telephone', 'created_by', 'role','deleted_at']);
        });
    }
};
