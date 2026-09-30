<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Dataset — Sony Nursery</title>

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
            --rust-500: #b5514a;
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
            min-width: 0;
            max-width: 1100px;
        }

        .topbar {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            margin-bottom: 28px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .topbar h1 {
            font-size: 26px;
            font-weight: 600;
        }

        .topbar p {
            margin: 4px 0 0;
            color: var(--ink-500);
            font-size: 14px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 16px;
            background: var(--paper-100);
            border: 1px solid var(--line);
            border-radius: 999px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            color: var(--ink-900);
            transition: border-color 0.15s;
        }

        .btn-back:hover {
            border-color: var(--sage-500);
        }

        /* ---------- Alerts ---------- */

        .success,
        .error {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.5;
        }

        .success {
            background: #eaf1e4;
            color: var(--forest-700);
            border: 1px solid #cfe0c2;
        }

        .error {
            background: #f6e6e4;
            color: var(--rust-500);
            border: 1px solid #ecc9c5;
        }

        /* ---------- Card ---------- */

        .card {
            background: white;
            padding: 26px 28px;
            border-radius: 14px;
            margin-bottom: 22px;
            box-shadow: 0 6px 20px rgba(28, 46, 33, 0.06);
        }

        .card h2 {
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--ink-500);
            margin-bottom: 8px;
        }

        input[type="file"] {
            width: 100%;
            padding: 14px;
            border: 1.5px dashed var(--sage-500);
            border-radius: 10px;
            background: var(--paper-50);
            font-size: 14px;
            font-family: inherit;
            color: var(--ink-900);
            margin: 0 0 20px;
        }

        button {
            padding: 12px 24px;
            background: var(--forest-900);
            color: white;
            border: none;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        button:hover {
            background: var(--forest-700);
        }

        button:active {
            transform: scale(0.98);
        }

        /* ---------- Table ---------- */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th,
        td {
            padding: 12px 14px;
            border-bottom: 1px solid var(--paper-100);
            text-align: left;
        }

        th {
            background: var(--forest-900);
            color: #eef2e9;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 12.5px;
        }

        th:first-child {
            border-top-left-radius: 10px;
        }

        th:last-child {
            border-top-right-radius: 10px;
        }

        tbody tr:hover {
            background: #f4f6ef;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody td[colspan] {
            text-align: center;
            padding: 26px;
            color: var(--ink-500);
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 12.5px;
            font-weight: 600;
        }

        .badge-success {
            background: #e2edd9;
            color: var(--forest-700);
        }

        .badge-pending {
            background: #f2e5cd;
            color: #8a5c1f;
        }

        .badge-failed {
            background: #f3dad8;
            color: var(--rust-500);
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
                    <h1>Kelola dataset</h1>
                    <p>Unggah data tanaman baru dan pantau riwayat unggahan.</p>
                </div>

                <a href="{{ route('admin.dashboard') }}" class="btn-back">
                    &larr; Kembali
                </a>
            </div>

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="error">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="card">

                <h2>Upload dataset CSV</h2>

                <form action="{{ route('admin.dataset.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label>Pilih file CSV</label>
                    <input type="file" name="file" accept=".csv" required>

                    <button type="submit">Upload dataset</button>
                </form>

            </div>

            <div class="card">

                <h2>Riwayat upload</h2>

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Jumlah Data</th>
                                <th>Admin</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($uploads as $upload)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $upload->nama_file }}</td>
                                    <td>{{ $upload->jumlah_data }}</td>
                                    <td>{{ $upload->user->name }}</td>
                                    <td>
                                        @php
                                            $badgeClass = match ($upload->status) {
                                                'success' => 'badge-success',
                                                'pending' => 'badge-pending',
                                                default => 'badge-failed',
                                            };
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">
                                            {{ ucfirst($upload->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $upload->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        Belum ada dataset yang diupload.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

</body>

</html>
