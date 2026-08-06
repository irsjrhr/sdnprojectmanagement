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
        Schema::create('blueprint_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blueprint_document_id')->constrained()->cascadeOnDelete();
            $table->string('req_code')->nullable();
            $table->string('module_name')->nullable();
            $table->text('description');
            $table->string('type')->default('Functional'); // Functional, Non-Functional
            $table->string('priority')->default('Must Have'); // Must Have, Should Have, Could Have, Won't Have
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blueprint_requirements');
    }
};
