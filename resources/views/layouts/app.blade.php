<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Arxino</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @stack('styles')
    <style>
        :root {
            --sidebar-w: 260px;
            --sidebar-collapsed-w: 72px;
            --transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
            --primary: #0891b2;
            --primary-dark: #2563eb;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --bg-body: linear-gradient(135deg, #eef2ff 0%, #f0f9ff 50%, #fafafa 100%);
            --bg-sidebar: #ffffff;
            --border: #e2e8f0;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Outfit', sans-serif; }

        body {
            background: var(--bg-body);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ═══════════════════════════════════════
           SIDEBAR
        ═══════════════════════════════════════ */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--bg-sidebar);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.06);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 200;
            transition: var(--transition);
            overflow: hidden;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-w);
        }

        /* ── Top bar (brand + toggle) ── */
        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 18px 16px;
            border-bottom: 1px solid var(--border);
            min-height: 64px;
            flex-shrink: 0;
        }

        .brand-title {
            font-size: 1.3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
            white-space: nowrap;
            opacity: 1;
            transition: opacity 0.2s ease, width 0.28s ease;
            overflow: hidden;
        }

        .sidebar.collapsed .brand-title {
            opacity: 0;
            width: 0;
        }

        .toggle-btn {
            background: none;
            border: none;
            cursor: pointer;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            transition: var(--transition);
            flex-shrink: 0;
        }

        .toggle-btn:hover {
            background: #f1f5f9;
            color: var(--text-main);
        }

        .toggle-btn svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            stroke-width: 2;
            fill: none;
        }

        /* ── Menu ── */
        .menu-scroll {
            flex-grow: 1;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 12px 0;
        }

        .menu-scroll::-webkit-scrollbar { width: 4px; }
        .menu-scroll::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 2px; }

        .menu-group-label {
            font-size: 0.68rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 14px 20px 6px;
            white-space: nowrap;
            overflow: hidden;
            transition: var(--transition);
        }

        .sidebar.collapsed .menu-group-label {
            padding: 14px 0 6px;
            opacity: 0;
            height: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        .menu-list {
            list-style: none;
            padding: 0 10px;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 10px;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
            white-space: nowrap;
            overflow: hidden;
        }

        .menu-item a:hover {
            color: var(--text-main);
            background: #f1f5f9;
        }

        .menu-item.active a {
            color: var(--primary);
            background: linear-gradient(135deg, rgba(8, 145, 178, 0.08), rgba(37, 99, 235, 0.08));
            border: 1px solid rgba(8, 145, 178, 0.15);
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .menu-label {
            opacity: 1;
            transition: opacity 0.18s ease;
            white-space: nowrap;
        }

        .sidebar.collapsed .menu-label {
            opacity: 0;
            width: 0;
        }

        /* Tooltip on collapsed */
        .menu-item a {
            position: relative;
        }

        .sidebar.collapsed .menu-item a::after {
            content: attr(data-label);
            position: absolute;
            left: calc(var(--sidebar-collapsed-w) - 8px);
            background: #1e293b;
            color: #fff;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 500;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transform: translateX(8px);
            transition: all 0.2s ease;
            z-index: 999;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .sidebar.collapsed .menu-item a:hover::after {
            opacity: 1;
            transform: translateX(0);
        }

        /* ── User Footer ── */
        .user-footer {
            border-top: 1px solid var(--border);
            padding: 16px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
            gap: 8px;
            min-height: 64px;
        }

        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            flex-grow: 1;
            transition: var(--transition);
        }

        .sidebar.collapsed .user-info {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        .user-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-main);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            font-size: 0.72rem;
            color: #94a3b8;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 0.78rem;
            font-weight: 600;
            transition: color 0.2s ease;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .sidebar.collapsed .logout-btn {
            display: none;
        }

        .logout-btn:hover { color: #ef4444; }

        /* ═══════════════════════════════════════
           MAIN CONTENT
        ═══════════════════════════════════════ */
        .main-content {
            margin-left: var(--sidebar-w);
            padding: 36px 40px;
            flex-grow: 1;
            min-height: 100vh;
            min-width: 0;
            transition: margin-left 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-content.collapsed {
            margin-left: var(--sidebar-collapsed-w);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 36px;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a;
        }

        /* Pagination Styles */
        .d-flex, .d-sm-flex { display: flex !important; }
        .justify-content-between, .justify-content-sm-between { justify-content: space-between !important; }
        .align-items-center, .align-items-sm-center { align-items: center !important; }
        .text-muted { color: #64748b !important; }
        .small { font-size: 0.85rem; margin-bottom: 0; }
        .flex-sm-fill { flex: 1 1 auto; }
        nav > .d-flex { margin-top: 10px; }
        @media (max-width: 575.98px) {
            .d-none { display: none !important; }
            .d-sm-flex { display: none !important; }
        }
        @media (min-width: 576px) {
            .d-sm-none { display: none !important; }
            .d-sm-flex { display: flex !important; }
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 5px;
            align-items: center;
        }
        .page-item .page-link {
            padding: 8px 14px;
            border-radius: 8px;
            border: 1px solid var(--border);
            color: var(--text-main);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
            background: #fff;
        }
        .page-item .page-link:hover {
            background: #f1f5f9;
        }
        .page-item.active .page-link {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }
        .page-item.disabled .page-link {
            color: #cbd5e1;
            background: #f8fafc;
            pointer-events: none;
        }
    </style>
</head>
<body>

    {{-- ═══════════ SIDEBAR ═══════════ --}}
    <aside class="sidebar" id="sidebar">

        {{-- Header --}}
        <div class="sidebar-header">
            <span class="brand-title">ARXINO</span>
            <button class="toggle-btn" id="toggleBtn" title="Toggle Sidebar">
                <svg viewBox="0 0 24 24">
                    <line x1="3" y1="6"  x2="21" y2="6"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
            </button>
        </div>

        {{-- Menu --}}
        <div class="menu-scroll">

            {{-- Dashboard --}}
            <ul class="menu-list">
                <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('/dashboard') }}" data-label="Dashboard">
                        <span class="menu-icon">📊</span>
                        <span class="menu-label">Dashboard</span>
                    </a>
                </li>
            </ul>

            {{-- User Management --}}
            <div class="menu-group-label">User Management</div>
            <ul class="menu-list">
                <li class="menu-item {{ request()->is('roles*') ? 'active' : '' }}">
                    <a href="{{ url('/roles') }}" data-label="Master Roles">
                        <span class="menu-icon">🛡️</span>
                        <span class="menu-label">Master Roles</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('permissions*') ? 'active' : '' }}">
                    <a href="{{ url('/permissions') }}" data-label="Master Permissions">
                        <span class="menu-icon">🔑</span>
                        <span class="menu-label">Master Permissions</span>
                    </a>
                </li>
            </ul>

            {{-- Project Management --}}
            <div class="menu-group-label">Project Management</div>
            <ul class="menu-list">
                <li class="menu-item {{ request()->is('projects*') ? 'active' : '' }}">
                    <a href="{{ url('/projects') }}" data-label="Projects">
                        <span class="menu-icon">📁</span>
                        <span class="menu-label">Projects</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('roadmap*') ? 'active' : '' }}">
                    <a href="{{ url('/roadmap') }}" data-label="Roadmap">
                        <span class="menu-icon">🗺️</span>
                        <span class="menu-label">Roadmap (Gantt)</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('epics*') ? 'active' : '' }}">
                    <a href="{{ url('/epics') }}" data-label="Epics">
                        <span class="menu-icon">🎯</span>
                        <span class="menu-label">Epics</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('sprints*') ? 'active' : '' }}">
                    <a href="{{ url('/sprints') }}" data-label="Sprints">
                        <span class="menu-icon">🏃</span>
                        <span class="menu-label">Sprints</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('tasks*') ? 'active' : '' }}">
                    <a href="{{ url('/tasks') }}" data-label="Tasks">
                        <span class="menu-icon">✅</span>
                        <span class="menu-label">Tasks</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('kanban*') ? 'active' : '' }}">
                    <a href="{{ url('/kanban') }}" data-label="Kanban Board">
                        <span class="menu-icon">🗂️</span>
                        <span class="menu-label">Kanban Board</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('project-features*') ? 'active' : '' }}">
                    <a href="{{ url('/project-features') }}" data-label="Features">
                        <span class="menu-icon">⚡</span>
                        <span class="menu-label">Features</span>
                    </a>
                </li>
            </ul>

            {{-- Documentation --}}
            <div class="menu-group-label">Documentation</div>
            <ul class="menu-list">
                <li class="menu-item {{ request()->is('blueprints*') ? 'active' : '' }}">
                    <a href="{{ url('/blueprints') }}" data-label="Blueprints">
                        <span class="menu-icon">📐</span>
                        <span class="menu-label">Blueprints</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('brd-documents*') ? 'active' : '' }}">
                    <a href="{{ url('/brd-documents') }}" data-label="BRD Documents">
                        <span class="menu-icon">📋</span>
                        <span class="menu-label">BRD Documents</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('erds*') ? 'active' : '' }}">
                    <a href="{{ url('/erds') }}" data-label="ERD">
                        <span class="menu-icon">🗄️</span>
                        <span class="menu-label">ERD</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('fsds*') ? 'active' : '' }}">
                    <a href="{{ url('/fsds') }}" data-label="FSD">
                        <span class="menu-icon">📝</span>
                        <span class="menu-label">FSD</span>
                    </a>
                </li>
            </ul>

        </div>

        {{-- User Footer --}}
        <div class="user-footer">
            <div class="user-avatar" title="{{ Auth::user()->name ?? 'User' }}">
                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
            </div>
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name ?? 'User' }}</span>
                <span class="user-role">Administrator</span>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Log Out</button>
            </form>
        </div>
    </aside>

    {{-- ═══════════ MAIN CONTENT ═══════════ --}}
    <main class="main-content" id="mainContent">
        <div class="page-header">
            <h1 class="page-title">@yield('page_title', 'Dashboard')</h1>
        </div>
        @yield('content')
    </main>

    <script>
        (function () {
            const sidebar     = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const toggleBtn   = document.getElementById('toggleBtn');
            const STORAGE_KEY = 'arxino_sidebar_collapsed';

            // Restore state from localStorage
            if (localStorage.getItem(STORAGE_KEY) === '1') {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('collapsed');
            }

            toggleBtn.addEventListener('click', function () {
                const isCollapsed = sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('collapsed', isCollapsed);
                localStorage.setItem(STORAGE_KEY, isCollapsed ? '1' : '0');
            });
        })();
    </script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>
</html>