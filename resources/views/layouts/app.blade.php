<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <style>
        :root {
            --bg: #f6f6f6;
            --panel: #ffffff;
            --panel-2: #fafafa;
            --text: #222222;
            --muted: #666666;
            --line: #c8c8c8;
            --accent: #df7a17;
            --accent-strong: #f08a18;
            --success: #5f5f5f;
            --danger: #d9534f;
            --warning: #f0ad4e;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        a { color: inherit; text-decoration: none; }

        .page {
            max-width: 1240px;
            margin: 0 auto;
            padding: 20px 24px;
        }

        .admin-navbar {
            background: #ea580c;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.18);
        }

        .admin-navbar-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            min-height: 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .admin-left {
            display: flex;
            align-items: center;
            gap: 24px;
            min-width: 0;
        }

        .admin-logo-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .admin-logo-circle {
            width: 36px;
            height: 36px;
            background: #ffffff;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ea580c;
            font-size: 11px;
            font-weight: 700;
        }

        .admin-logo-text {
            color: #ffffff;
            font-size: 18px;
            font-weight: 700;
            white-space: nowrap;
        }

        .admin-logo-text span {
            color: #fdba74;
        }

        .admin-desktop-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            color: #ffedd5;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: background-color 120ms ease, color 120ms ease;
            white-space: nowrap;
        }

        .nav-link:hover {
            color: #ffffff;
            background: #c2410c;
        }

        .nav-link-active {
            background: #c2410c;
            color: #ffffff;
        }

        .admin-right {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: auto;
        }

        .admin-role {
            background: #f97316;
            color: #ffffff;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            padding: 4px 8px;
            border-radius: 999px;
        }

        .admin-email {
            color: #ffedd5;
            font-size: 13px;
        }

        .admin-logout {
            color: #fed7aa;
            text-decoration: underline;
            font-size: 13px;
        }

        .admin-logout:hover {
            color: #ffffff;
        }

        .admin-mobile-toggle {
            display: none;
            border: 1px solid #fb923c;
            color: #ffedd5;
            background: transparent;
            border-radius: 8px;
            width: 38px;
            height: 38px;
            font-size: 22px;
            line-height: 1;
            cursor: pointer;
        }

        .admin-mobile-menu {
            display: none;
            background: #c2410c;
            padding: 10px 16px 14px;
        }

        .admin-mobile-menu.open {
            display: block;
        }

        .admin-mobile-links {
            display: grid;
            gap: 6px;
        }

        .admin-mobile-links .nav-link {
            display: block;
        }

        .admin-mobile-account {
            border-top: 1px solid #ea580c;
            margin-top: 10px;
            padding-top: 10px;
            display: grid;
            gap: 8px;
        }

        .section-subtitle,
        .muted {
            color: var(--muted);
        }

        .badge,
        .button,
        .button-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-weight: 400;
            border: 1px solid var(--line);
            transition: background-color 120ms ease, border-color 120ms ease;
        }

        .badge { padding: 4px 10px; background: #efefef; color: var(--text); }
        .button, .button-link { padding: 5px 12px; background: #efefef; color: var(--text); }
        .button:hover, .button-link:hover, .badge:hover { background: #e2e2e2; }
        .button-primary { background: #efefef; color: var(--text); border-color: #a7a7a7; }
        .button-secondary { background: #efefef; color: var(--text); }
        .button-danger { background: #6f6f6f; color: #ffffff; border-color: #6f6f6f; }

        main { padding: 0; }

        .alert {
            margin-bottom: 16px;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid var(--line);
            background: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert.alert-error {
            background: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .grid {
            display: grid;
            gap: 20px;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 14px;
        }

        .hero h1,
        .hero h2 {
            margin: 0 0 10px;
            font-size: 1.5rem;
            line-height: 1.1;
        }

        .hero p { margin: 0; max-width: 60ch; color: var(--muted); }

        .panel {
            border: 1px solid var(--line);
            border-radius: 8px;
            overflow: hidden;
            background: var(--panel);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 8px 10px;
            border-bottom: 1px solid var(--line);
            text-align: left;
            vertical-align: top;
        }

        .table th {
            color: var(--text);
            font-size: 0.95rem;
            background: #f4f4f4;
        }

        .table tr:last-child td { border-bottom: none; }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .stack { display: grid; gap: 14px; }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 8px;
        }

        .field {
            display: grid;
            grid-template-columns: 160px 1fr;
            gap: 10px;
            align-items: center;
        }

        .field label {
            font-weight: 400;
            color: var(--text);
        }

        .field input,
        .field textarea {
            width: 100%;
            padding: 4px 8px;
            border-radius: 6px;
            border: 1px solid var(--line);
            background: #ffffff;
            color: var(--text);
            outline: none;
        }

        .field input:focus,
        .field textarea:focus {
            border-color: #888888;
            box-shadow: none;
        }

        .field textarea { min-height: 30px; resize: vertical; }

        .error {
            color: #8a1f1f;
            font-size: 0.88rem;
        }

        .form-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 12px;
        }

        .empty {
            padding: 18px 14px;
            text-align: center;
            color: var(--muted);
        }

        @media (max-width: 1200px) {
            .admin-navbar-inner {
                max-width: 100%;
            }
        }

        @media (max-width: 992px) {
            .admin-navbar-inner {
                padding: 0 16px;
            }

            .admin-logo-text {
                display: none;
            }

            .admin-desktop-links,
            .admin-right {
                display: none;
            }

            .admin-mobile-toggle {
                display: block;
            }

            .page {
                padding: 16px;
            }
        }

        @media (max-width: 860px) {
            .form-grid { grid-template-columns: 1fr; }
            .field { grid-template-columns: 1fr; }

            .hero { flex-direction: column; align-items: flex-start; }

            .page {
                padding: 16px;
            }
        }

        @media (max-width: 560px) {
            .admin-mobile-menu {
                padding: 10px 12px 12px;
            }

            .hero h1,
            .hero h2 {
                font-size: 1.25rem;
            }

            .page {
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <nav class="admin-navbar">
        <div class="admin-navbar-inner">
            <div class="admin-left">
                <a href="{{ route('leveranciers.index') }}" class="admin-logo-link">
                    <span class="admin-logo-circle">VB</span>
                    <span class="admin-logo-text">Voedselbank <span>Maaskantje</span></span>
                </a>

                <div class="admin-desktop-links">
                    <a href="#" class="nav-link">Overzicht</a>
                    <a href="#" class="nav-link">Informatie</a>
                    <a href="#" class="nav-link">Voorraad</a>
                    <a href="#" class="nav-link">Allergieen</a>
                    <a href="{{ route('leveranciers.index') }}" class="nav-link nav-link-active">Leveranciers</a>
                </div>
            </div>

            <div class="admin-right">
                <span class="admin-role">Admin</span>
                <span class="admin-email">Mohammed@gmail.com</span>
                <a class="admin-logout" href="#">Uitloggen</a>
            </div>

            <button type="button" class="admin-mobile-toggle" id="admin-mobile-toggle" aria-label="Menu openen" aria-expanded="false">
                ☰
            </button>
        </div>

        <div class="admin-mobile-menu" id="admin-mobile-menu">
            <div class="admin-mobile-links">
                <a href="#" class="nav-link">Overzicht</a>
                <a href="#" class="nav-link">Informatie</a>
                <a href="#" class="nav-link">Voorraad</a>
                <a href="#" class="nav-link">Allergieen</a>
                <a href="{{ route('leveranciers.index') }}" class="nav-link nav-link-active">Leveranciers</a>
            </div>

            <div class="admin-mobile-account">
                <span class="admin-email">Mohammed@gmail.com</span>
                <a class="admin-logout" href="#">Uitloggen</a>
            </div>
        </div>
    </nav>

    <div class="page">
        <main>
            @if (session('status'))
                <div class="alert">{{ session('status') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        (() => {
            const toggleButton = document.getElementById('admin-mobile-toggle');
            const mobileMenu = document.getElementById('admin-mobile-menu');

            if (!toggleButton || !mobileMenu) {
                return;
            }

            toggleButton.addEventListener('click', () => {
                const isOpen = mobileMenu.classList.toggle('open');
                toggleButton.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                toggleButton.textContent = isOpen ? '✕' : '☰';
            });
        })();
    </script>
</body>
</html>