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
        Schema::table('blueprint_documents', function (Blueprint $table) {
            $table->json('document_history')->nullable();
            $table->json('document_distribution')->nullable();
            $table->json('flowcharts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blueprint_documents', function (Blueprint $table) {
            $table->dropColumn(['document_history', 'document_distribution', 'flowcharts']);
        });
    }
};
