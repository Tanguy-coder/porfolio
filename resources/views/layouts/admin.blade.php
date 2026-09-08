<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — MH. Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #0f0f1a;
            color: #f0f0f5;
            min-height: 100vh;
            display: flex;
        }
        a { color: inherit; text-decoration: none; }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #1e1b4b;
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .sidebar-logo {
            font-size: 1.4rem;
            font-weight: 800;
            color: #6c63ff;
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 1rem;
        }
        .sidebar-nav { flex: 1; display: flex; flex-direction: column; gap: 2px; }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: #c0bfe0;
            transition: all 0.2s;
        }
        .sidebar-nav a:hover { background: rgba(108,99,255,0.15); color: #fff; }
        .sidebar-nav a.active { background: rgba(108,99,255,0.25); color: #fff; border-right: 3px solid #6c63ff; }
        .sidebar-nav .nav-icon { width: 20px; text-align: center; font-size: 1rem; }
        .sidebar-spacer { flex: 1; }
        .sidebar-footer {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 0.5rem;
            margin-top: 0.5rem;
        }

        .main {
            margin-left: 250px;
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .topbar {
            background: #1a1a2e;
            padding: 1.25rem 2rem;
            border-bottom: 1px solid #2a2a38;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .topbar h1 { font-size: 1.25rem; font-weight: 700; }
        .content { padding: 2rem; flex: 1; }

        .flash {
            padding: 0.85rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .flash-success { background: rgba(74,222,128,0.15); color: #4ade80; border: 1px solid rgba(74,222,128,0.3); }
        .flash-error { background: rgba(239,68,68,0.15); color: #ef4444; border: 1px solid rgba(239,68,68,0.3); }

        .card {
            background: #1a1a2e;
            border: 1px solid #2a2a38;
            border-radius: 12px;
            padding: 1.5rem;
        }

        table { width: 100%; border-collapse: collapse; }
        th {
            text-align: left;
            padding: 0.75rem 1rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #a0a0b0;
            border-bottom: 1px solid #2a2a38;
        }
        td {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            border-bottom: 1px solid #1e1e2a;
            vertical-align: middle;
        }
        tr:hover td { background: rgba(108,99,255,0.05); }

        .form-group { margin-bottom: 1.25rem; }
        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #a0a0b0;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.4rem;
        }
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            background: #0f0f1a;
            border: 1px solid #2a2a38;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            color: #f0f0f5;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 0 3px rgba(108,99,255,0.15);
        }
        .form-group textarea { resize: vertical; min-height: 100px; }
        .form-group select option { background: #1a1a2e; }
        .form-error { color: #ef4444; font-size: 0.8rem; margin-top: 0.3rem; }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #6c63ff;
        }
        .checkbox-group label {
            text-transform: none;
            font-size: 0.9rem;
            color: #f0f0f5;
            margin-bottom: 0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Inter', sans-serif;
        }
        .btn-primary { background: #6c63ff; color: #fff; }
        .btn-primary:hover { background: #8b83ff; transform: translateY(-1px); }
        .btn-danger { background: #dc2626; color: #fff; }
        .btn-danger:hover { background: #ef4444; }
        .btn-secondary { background: #2a2a38; color: #a0a0b0; }
        .btn-secondary:hover { background: #3a3a48; color: #f0f0f5; }
        .btn-sm { padding: 0.4rem 0.75rem; font-size: 0.8rem; }

        .actions { display: flex; gap: 0.5rem; align-items: center; }
        .actions form { display: inline; }

        .badge-active { color: #4ade80; }
        .badge-inactive { color: #ef4444; }

        .header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        .header-row h2 { font-size: 1.1rem; font-weight: 700; }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-logo">MH. Admin</div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="nav-icon">📊</span> Dashboard
            </a>
            <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <span class="nav-icon">🚀</span> Projets
            </a>
            <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                <span class="nav-icon">⚡</span> Compétences
            </a>
            <a href="{{ route('admin.certifications.index') }}" class="{{ request()->routeIs('admin.certifications.*') ? 'active' : '' }}">
                <span class="nav-icon">🏅</span> Certifications
            </a>
            <a href="{{ route('admin.experiences.index') }}" class="{{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">
                <span class="nav-icon">💼</span> Expériences
            </a>
            <a href="{{ route('admin.about-values.index') }}" class="{{ request()->routeIs('admin.about-values.*') ? 'active' : '' }}">
                <span class="nav-icon">🎯</span> À propos
            </a>
            <a href="{{ route('admin.contact-infos.index') }}" class="{{ request()->routeIs('admin.contact-infos.*') ? 'active' : '' }}">
                <span class="nav-icon">📬</span> Contact
            </a>
            <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <span class="nav-icon">⚙️</span> Paramètres
            </a>
            <div class="sidebar-spacer"></div>
            <div class="sidebar-footer">
                <a href="{{ route('portfolio') }}" target="_blank">
                    <span class="nav-icon">🌐</span> Voir le site
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="background:none;border:none;cursor:pointer;width:100%;text-align:left;">
                        <a href="#" onclick="this.closest('form').submit();return false;">
                            <span class="nav-icon">🚪</span> Déconnexion
                        </a>
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <div class="main">
        <div class="topbar">
            <h1>@yield('title', 'Dashboard')</h1>
        </div>
        <div class="content">
            @if(session('success'))
                <div class="flash flash-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="flash flash-error">{{ session('error') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>
