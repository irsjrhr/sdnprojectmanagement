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
        // Remove old pic_id from brd_documents
        Schema::table('brd_documents', function (Blueprint $table) {
            $table->dropForeign(['pic_id']);
            $table->dropColumn('pic_id');
        });

        // Create pivot table for Many-to-Many
        Schema::create('brd_document_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brd_document_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brd_document_user');
        
        Schema::table('brd_documents', function (Blueprint $table) {
            $table->foreignId('pic_id')->nullable()->constrained('users')->nullOnDelete();
        });
    }
};
