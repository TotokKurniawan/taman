<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dataset Tanaman — Sony Nursery</title>

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
            min-width: 0;
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

        /* ---------- Toolbar / sort filter ---------- */

        .toolbar {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .toolbar-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink-500);
        }

        .sort-toggle {
            display: inline-flex;
            background: var(--paper-100);
            border: 1px solid var(--line);
            border-radius: 999px;
            padding: 3px;
            gap: 2px;
        }

        .sort-toggle a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            color: var(--ink-500);
            transition: background 0.15s, color 0.15s;
        }

        .sort-toggle a:hover {
            color: var(--ink-900);
        }

        .sort-toggle a.active {
            background: var(--forest-900);
            color: white;
        }

        .sort-toggle a svg {
            flex-shrink: 0;
        }

        /* ---------- Card / table ---------- */

        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(28, 46, 33, 0.06);
            padding: 8px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13.5px;
            min-width: 1150px;
        }

        th,
        td {
            padding: 13px 16px;
            border-bottom: 1px solid var(--paper-100);
            text-align: left;
            white-space: nowrap;
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

        td:first-child {
            color: var(--ink-500);
        }

        tbody tr:hover {
            background: #f4f6ef;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .empty {
            text-align: center;
            padding: 34px;
            color: var(--ink-500);
        }

        /* ---------- Pagination ---------- */

        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 22px;
            padding: 4px 8px 12px;
            flex-wrap: wrap;
            gap: 14px;
        }

        .pagination-info {
            font-size: 13px;
            color: var(--ink-500);
        }

        .pagination-info strong {
            color: var(--ink-900);
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .pagination a,
        .pagination span {
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            font-size: 13px;
            text-decoration: none;
            border: 1px solid var(--line);
            color: var(--forest-700);
            background: white;
        }

        .pagination a:hover {
            border-color: var(--sage-500);
        }

        .pagination .active {
            background: var(--forest-900);
            color: white;
            border-color: var(--forest-900);
            font-weight: 600;
        }

        .pagination .disabled {
            color: #b7c0af;
            background: var(--paper-100);
            cursor: not-allowed;
        }

        .pagination .dots {
            min-width: auto;
            height: auto;
            border: none;
            background: none;
            padding: 0 4px;
            color: var(--ink-500);
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

    @php
        // Nilai sort aktif, default terbaru dulu (descending)
        $sort = request('sort', 'desc') === 'asc' ? 'asc' : 'desc';

        // Supaya tombol nomor halaman ikut membawa parameter ?sort=... saat berpindah halaman
        $dataset->appends(['sort' => $sort]);
    @endphp

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
                    <h1>Data dataset tanaman</h1>
                    <p>Seluruh data tanaman yang tersimpan di sistem.</p>
                </div>

                <a href="{{ route('admin.dashboard') }}" class="btn-back">
                    &larr; Kembali
                </a>
            </div>

            <div class="toolbar">
                <span class="toolbar-label">Urutkan tanggal upload</span>

                <div class="sort-toggle">
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'desc', 'page' => 1]) }}"
                        class="{{ $sort === 'desc' ? 'active' : '' }}">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                            <path d="M12 5V19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                            <path d="M6 13L12 19L18 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Terbaru
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'asc', 'page' => 1]) }}"
                        class="{{ $sort === 'asc' ? 'active' : '' }}">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                            <path d="M12 19V5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                            <path d="M6 11L12 5L18 11" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Terlama
                    </a>
                </div>
            </div>

            <div class="card">

                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tanaman</th>
                                <th>Tipe Utama Tanaman</th>
                                <th>Intensitas Cahaya</th>
                                <th>Intensitas Air</th>
                                <th>Frekuensi Penyiraman</th>
                                <th>Konsep Utama Taman</th>
                                <th>Ukuran Taman Cocok</th>
                                <th>Lokasi Penanaman</th>
                                <th>Tanggal Upload</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($dataset as $data)
                                <tr>
                                    <td>{{ $dataset->firstItem() + $loop->index }}</td>
                                    <td>{{ $data->nama_tanaman }}</td>
                                    <td>{{ $data->tipe_utama_tanaman }}</td>
                                    <td>{{ $data->intensitas_cahaya_kategori }}</td>
                                    <td>{{ $data->intensitas_air_kategori }}</td>
                                    <td>{{ $data->cara_penyiraman_frekuensi }}</td>
                                    <td>{{ $data->konsep_utama_taman }}</td>
                                    <td>{{ $data->ukuran_taman_cocok_kategori }}</td>
                                    <td>{{ $data->lokasi_penanaman }}</td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="empty">
                                        Belum ada data dataset tanaman.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                @if ($dataset->hasPages())

                    <div class="pagination-wrapper">

                        <div class="pagination-info">
                            Menampilkan
                            <strong>{{ $dataset->firstItem() }}</strong>
                            -
                            <strong>{{ $dataset->lastItem() }}</strong>
                            dari
                            <strong>{{ $dataset->total() }}</strong>
                            data
                        </div>

                        <div class="pagination">

                            @if ($dataset->onFirstPage())
                                <span class="disabled">&laquo;</span>
                            @else
                                <a href="{{ $dataset->previousPageUrl() }}">&laquo;</a>
                            @endif

                            @php
                                $current = $dataset->currentPage();
                                $last = $dataset->lastPage();
                                $delta = 1;
                                $range = collect(range(max(1, $current - $delta), min($last, $current + $delta)));
                                $pages = collect([1])
                                    ->merge($range)
                                    ->merge([$last])
                                    ->unique()
                                    ->sort()
                                    ->values();
                            @endphp

                            @foreach ($pages as $index => $page)
                                @if ($index > 0 && $page - $pages[$index - 1] > 1)
                                    <span class="dots">&hellip;</span>
                                @endif

                                @if ($page == $current)
                                    <span class="active">{{ $page }}</span>
                                @else
                                    <a href="{{ $dataset->url($page) }}">{{ $page }}</a>
                                @endif
                            @endforeach

                            @if ($dataset->hasMorePages())
                                <a href="{{ $dataset->nextPageUrl() }}">&raquo;</a>
                            @else
                                <span class="disabled">&raquo;</span>
                            @endif

                        </div>

                    </div>

                @endif

            </div>

        </main>

    </div>

</body>

</html>
