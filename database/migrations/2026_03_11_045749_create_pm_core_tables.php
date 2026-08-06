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
        // 1. Projects Table
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('key')->unique();
            $table->text('description')->nullable();
            $table->foreignId('owner_id')->constrained('users')->cascadeOnDelete();
            $table->string('status')->default('Active');
            $table->json('workflow_config')->nullable(); // For per-project status transitions
            $table->json('custom_field_definitions')->nullable(); // For custom fields per project
            $table->timestamps();
        });

        // 2. Epics Table
        Schema::create('epics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('status')->default('To Do');
            $table->timestamps();
        });

        // 3. Sprints Table
        Schema::create('sprints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->text('goal')->nullable();
            $table->enum('status', ['Planned', 'Active', 'Completed'])->default('Planned');
            $table->timestamps();
        });

        // 4. Tasks Table
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('epic_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('sprint_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('tasks')->nullOnDelete();
            $table->foreignId('reporter_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('assignee_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('type', ['Bug', 'Story', 'Task', 'Subtask'])->default('Task');
            $table->enum('priority', ['Highest', 'High', 'Medium', 'Low', 'Lowest'])->default('Medium');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('status')->default('To Do');
            $table->integer('story_points')->nullable();
            $table->decimal('estimated_hours', 8, 2)->nullable();
            $table->json('custom_fields')->nullable(); // Actual values for custom fields
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('sprints');
        Schema::dropIfExists('epics');
        Schema::dropIfExists('projects');
    }

};
