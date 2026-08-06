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
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('brd_document_id')->nullable()->constrained()->nullOnDelete();
        });
        
        // Also drop the old task_id from brd_documents to avoid confusion
        Schema::table('brd_documents', function (Blueprint $table) {
            $table->dropForeign(['task_id']);
            $table->dropColumn('task_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brd_documents', function (Blueprint $table) {
            $table->foreignId('task_id')->nullable()->constrained('tasks')->nullOnDelete();
        });
        
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['brd_document_id']);
            $table->dropColumn('brd_document_id');
        });
    }
};
