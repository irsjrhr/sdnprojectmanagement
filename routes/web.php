<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EpicController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectFeatureController;
use App\Http\Controllers\BlueprintController;
use App\Http\Controllers\BrdDocumentController;
use App\Http\Controllers\ErdController;
use App\Http\Controllers\FsdController;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\TaskCommentController;
use App\Http\Controllers\ProjectFeatureCommentController;

Route::get('/', fn() => redirect('/dashboard'));

Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // User Management
    Route::resource('roles', \App\Http\Controllers\RoleController::class)->except(['show']);
    Route::get('roles/{role}/permissions', [\App\Http\Controllers\RoleController::class, 'getPermissions']);
    Route::post('roles/{role}/permissions', [\App\Http\Controllers\RoleController::class, 'syncPermissions'])->name('roles.permissions.sync');
    
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class)->except(['show']);

    // Project Management
    Route::resource('projects', ProjectController::class);

    Route::get('/roadmap', [App\Http\Controllers\RoadmapController::class, 'index'])->name('roadmap.index');
    Route::post('/roadmap/update-date', [App\Http\Controllers\RoadmapController::class, 'updateDate'])->name('roadmap.updateDate');
    
    Route::resource('epics', EpicController::class);
    
    Route::resource('sprints', SprintController::class);
    
    Route::get('tasks/index_async', [TaskController::class, 'index_async'])->name('tasks.index_async');
    Route::resource('tasks', TaskController::class);
    // Task Comments
    Route::post('tasks/{task}/comments', [TaskCommentController::class, 'store'])->name('task-comments.store');
    Route::delete('tasks/{task}/comments/{comment}', [TaskCommentController::class, 'destroy'])->name('task-comments.destroy');

    // Project Features
    Route::get('project-features/index_async', [ProjectFeatureController::class, 'index_async'])->name('project-features.index_async');
    Route::get('project-features', [ProjectFeatureController::class, 'index'])->name('project-features.index');
    Route::get('project-features/create', [ProjectFeatureController::class, 'create'])->name('project-features.create');
    Route::post('project-features', [ProjectFeatureController::class, 'store'])->name('project-features.store');
    Route::delete('project-features/{projectFeature}', [ProjectFeatureController::class, 'destroy'])->name('project-features.destroy');
    Route::get('project-features/{projectFeature}/edit', [ProjectFeatureController::class, 'edit'])->name('project-features.edit');
    Route::put('project-features/{projectFeature}', [ProjectFeatureController::class, 'update'])->name('project-features.update');
    Route::get('project-features/{projectFeature}', [ProjectFeatureController::class, 'show'])->name('project-features.show');
        
    // Feature Comments
    Route::post('project-features/{projectFeature}/comments', [ProjectFeatureCommentController::class, 'store'])->name('project-feature-comments.store');
    Route::delete('project-features/{projectFeature}/comments/{comment}', [ProjectFeatureCommentController::class, 'destroy'])->name('project-feature-comments.destroy');
    // For feedback and toggle, it can be accessed by `manage features` OR `edit feature gap`. We'll protect these in the Controller.
    Route::patch('project-features/{projectFeature}/toggle', [ProjectFeatureController::class, 'toggle'])->name('project-features.toggle');
    Route::patch('project-features/{projectFeature}/feedback', [ProjectFeatureController::class, 'feedback'])->name('project-features.feedback');

    // Kanban
    Route::get('/kanban', [KanbanController::class, 'index'])->name('kanban.index');
    Route::post('/kanban/update-task', [KanbanController::class, 'updateTaskStatus'])->name('kanban.updateTaskStatus');

    // Documentation
    Route::get('brd-documents/index_async', [BrdDocumentController::class, 'index_async'])->name('brd-documents.index_async');
    Route::resource('brd-documents', BrdDocumentController::class);

    Route::resource('blueprints', BlueprintController::class);
    

    Route::resource('erds',           ErdController::class);
    Route::get('fsds/index_async',    [FsdController::class, 'index_async'])->name('fsds.index_async');
    Route::resource('fsds',           FsdController::class);
});