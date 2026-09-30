<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin — Sony Nursery</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --forest-900: #1c2e21;
            --forest-700: #2b4433;
            --forest-600: #3a5842;
            --sage-500: #7c9473;
            --leaf-400: #8faa6b;
            --clay-500: #b8763f;
            --paper-50: #f6f4ee;
            --paper-100: #eeebe0;
            --ink-900: #22301f;
            --ink-500: #64705f;
            --line: #ddd8c8;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', Arial, sans-serif;
            background: var(--paper-50);
            color: var(--ink-900);
        }

        h1,
        h2,
        h3 {
            font-family: 'Fraunces', Georgia, serif;
            margin: 0;
        }

        a {
            color: inherit;
        }

        .app {
            display: flex;
            min-height: 100vh;
        }

        /* ---------- Sidebar ---------- */

        .sidebar {
            width: 250px;
            flex-shrink: 0;
            background: var(--forest-900);
            color: #eef2e9;
            display: flex;
            flex-direction: column;
            padding: 28px 18px;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 10px 28px;
            border-bottom: 1px solid rgba(238, 242, 233, 0.12);
            margin-bottom: 22px;
        }

        .brand svg {
            flex-shrink: 0;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .brand-text strong {
            font-family: 'Fraunces', serif;
            font-size: 18px;
            font-weight: 600;
        }

        .brand-text span {
            font-size: 12px;
            color: var(--sage-500);
        }

        .nav {
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1;
        }

        .nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 999px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            color: #cdd6c5;
            transition: background 0.15s, color 0.15s;
        }

        .nav a svg {
            flex-shrink: 0;
            opacity: 0.85;
        }

        .nav a:hover {
            background: rgba(238, 242, 233, 0.08);
            color: #f6f4ee;
        }

        .nav a.active {
            background: var(--forest-700);
            color: #ffffff;
        }

        .nav a.active svg {
            opacity: 1;
        }

        .sidebar-footer {
            border-top: 1px solid rgba(238, 242, 233, 0.12);
            padding-top: 16px;
        }

        .sidebar-footer form button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            background: transparent;
            border: 1px solid rgba(238, 242, 233, 0.2);
            border-radius: 999px;
            color: #cdd6c5;
            font-size: 14px;
            font-family: inherit;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .sidebar-footer form button:hover {
            background: rgba(238, 242, 233, 0.08);
            border-color: rgba(238, 242, 233, 0.35);
        }

        /* ---------- Main ---------- */

        .main {
            flex: 1;
            padding: 36px 44px;
            max-width: 1100px;
        }

        .topbar {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .topbar h1 {
            font-size: 28px;
            font-weight: 600;
            color: var(--ink-900);
        }

        .topbar p {
            margin: 4px 0 0;
            color: var(--ink-500);
            font-size: 14px;
        }

        /* ---------- Stat cards ---------- */

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 22px 24px;
            box-shadow: 0 6px 20px rgba(28, 46, 33, 0.06);
            border-left: 4px solid var(--leaf-400);
        }

        .stat-card.clay {
            border-left-color: var(--clay-500);
        }

        .stat-card h3 {
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 600;
            color: var(--ink-500);
            margin-bottom: 10px;
        }

        .stat-card p {
            font-family: 'Fraunces', serif;
            font-size: 36px;
            font-weight: 600;
            margin: 0;
            color: var(--forest-900);
        }

        /* ---------- Action cards ---------- */

        .section-label {
            font-size: 15px;
            font-weight: 600;
            color: var(--ink-900);
            margin-bottom: 14px;
        }

        .actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
        }

        .action-card {
            display: block;
            background: var(--paper-100);
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 20px 22px;
            text-decoration: none;
            color: var(--ink-900);
            transition: border-color 0.15s, transform 0.1s;
        }

        .action-card:hover {
            border-color: var(--sage-500);
        }

        .action-card:active {
            transform: scale(0.99);
        }

        .action-card svg {
            margin-bottom: 12px;
        }

        .action-card h3 {
            font-family: 'Inter', sans-serif;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .action-card p {
            margin: 0;
            font-size: 13px;
            color: var(--ink-500);
            line-height: 1.5;
        }

        /* ---------- Responsive ---------- */

        @media (max-width: 820px) {
            .app {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                flex-direction: row;
                align-items: center;
                padding: 14px 18px;
                overflow-x: auto;
            }

            .brand {
                border-bottom: none;
                border-right: 1px solid rgba(238, 242, 233, 0.12);
                padding: 0 16px 0 0;
                margin: 0 16px 0 0;
            }

            .nav {
                flex-direction: row;
            }

            .sidebar-footer {
                border-top: none;
                padding-top: 0;
                margin-left: 12px;
            }

            .sidebar-footer form button {
                white-space: nowrap;
            }

            .main {
                padding: 26px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="app">

        <aside class="sidebar">

            <div class="brand">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                    <path d="M12 21C12 21 5 17.5 5 10.5C5 6.5 8 3 12 3C16 3 19 6.5 19 10.5C19 17.5 12 21 12 21Z"
                        stroke="#8faa6b" stroke-width="1.6" stroke-linejoin="round" />
                    <path d="M12 21V10" stroke="#8faa6b" stroke-width="1.6" stroke-linecap="round" />
                </svg>
                <div class="brand-text">
                    <strong>Sony Nursery</strong>
                    <span>Panel admin</span>
                </div>
            </div>

            <nav class="nav">

                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="M4 11.5L12 4L20 11.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M6 10V20H18V10" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.dataset.index') }}"
                    class="{{ request()->routeIs('admin.dataset.index') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M4 7L4 18C4 18.55 4.45 19 5 19H19C19.55 19 20 18.55 20 18V9C20 8.45 19.55 8 19 8H12L10 6H5C4.45 6 4 6.45 4 7Z"
                            stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                    </svg>
                    Kelola Dataset
                </a>

                <a href="{{ route('admin.dataset.data') }}"
                    class="{{ request()->routeIs('admin.dataset.data') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <rect x="4" y="5" width="16" height="14" rx="1.5" stroke="currentColor"
                            stroke-width="1.6" />
                        <path d="M4 10H20" stroke="currentColor" stroke-width="1.6" />
                        <path d="M9 10V19" stroke="currentColor" stroke-width="1.6" />
                    </svg>
                    Tampil Dataset
                </a>

            </nav>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <path d="M9 4H6C4.9 4 4 4.9 4 6V18C4 19.1 4.9 20 6 20H9" stroke="currentColor"
                                stroke-width="1.6" stroke-linecap="round" />
                            <path d="M15 16L20 11.5L15 7" stroke="currentColor" stroke-width="1.6"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.5 11.5H20" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>

        </aside>

        <main class="main">

            <div class="topbar">
                <div>
                    <h1>Dashboard</h1>
                    <p>Ringkasan data tanaman dan aktivitas unggah.</p>
                </div>
            </div>

            <div class="stats">

                <div class="stat-card">
                    <h3>Jumlah data tanaman</h3>
                    <p>{{ $jumlahData }}</p>
                </div>

                <div class="stat-card clay">
                    <h3>Jumlah upload</h3>
                    <p>{{ $jumlahUpload }}</p>
                </div>

            </div>

            <div class="section-label">Kelola data</div>

            <div class="actions">

                <a href="{{ route('admin.dataset.index') }}" class="action-card">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M4 7L4 18C4 18.55 4.45 19 5 19H19C19.55 19 20 18.55 20 18V9C20 8.45 19.55 8 19 8H12L10 6H5C4.45 6 4 6.45 4 7Z"
                            stroke="#3a5842" stroke-width="1.6" stroke-linejoin="round" />
                    </svg>
                    <h3>Kelola dataset</h3>
                    <p>Tambah, ubah, atau hapus data tanaman dalam dataset.</p>
                </a>

                <a href="{{ route('admin.dataset.data') }}" class="action-card">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <rect x="4" y="5" width="16" height="14" rx="1.5" stroke="#3a5842"
                            stroke-width="1.6" />
                        <path d="M4 10H20" stroke="#3a5842" stroke-width="1.6" />
                        <path d="M9 10V19" stroke="#3a5842" stroke-width="1.6" />
                    </svg>
                    <h3>Tampilkan dataset</h3>
                    <p>Lihat seluruh data tanaman yang sudah tersimpan.</p>
                </a>

            </div>

        </main>

    </div>

</body>

</html>
