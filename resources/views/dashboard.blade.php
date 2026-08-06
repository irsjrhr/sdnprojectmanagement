@extends('layouts.app')

@section('title', 'Overview')
@section('page_title', 'Project Management Dashboard')

@section('content')
<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }
    .card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-4px);
        border-color: rgba(8, 145, 178, 0.3);
        box-shadow: 0 12px 24px rgba(8, 145, 178, 0.08);
    }
    .card-title {
        font-size: 0.8rem;
        font-weight: 600;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        margin-bottom: 12px;
    }
    .card-val {
        font-size: 2.4rem;
        font-weight: 800;
        background: linear-gradient(135deg, #0891b2 0%, #2563eb 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .welcome-card {
        background: linear-gradient(135deg, #0891b2 0%, #2563eb 100%);
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 40px;
        box-shadow: 0 8px 24px rgba(8, 145, 178, 0.25);
    }
    .welcome-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 8px;
    }
    .welcome-desc {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.75);
    }
</style>

<div class="welcome-card">
    <div class="welcome-title">Selamat Datang kembali, {{ Auth::user()->name }}!</div>
    <div class="welcome-desc">Kelola dokumen Blueprint, BRD, FSD, ERD, dan rancangan sistem Anda di dalam satu repositori terpusat.</div>
</div>

<div class="grid">
    <div class="card">
        <div class="card-title">Active Projects</div>
        <div class="card-val">{{ \App\Models\Project::where('status', 'Active')->count() }}</div>
    </div>
    <div class="card">
        <div class="card-title">Completed Sprints</div>
        <div class="card-val">{{ \App\Models\Sprint::where('status', 'Completed')->count() }}</div>
    </div>
    <div class="card">
        <div class="card-title">Total Tasks</div>
        <div class="card-val">{{ \App\Models\Task::count() }}</div>
    </div>
    <div class="card">
        <div class="card-title">Documentation Logs</div>
        <div class="card-val">{{ \App\Models\BrdDocument::count() + \App\Models\Fsd::count() }}</div>
    </div>
</div>
@endsection