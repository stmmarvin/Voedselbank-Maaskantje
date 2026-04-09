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
            --accent: #7d7d7d;
            --accent-strong: #5f5f5f;
            --success: #5f5f5f;
            --danger: #7a7a7a;
            --warning: #7a7a7a;
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
            max-width: 1120px;
            margin: 0 auto;
            padding: 20px;
        }

        .shell {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 2px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 12px 16px;
            border-bottom: 1px solid var(--line);
            background: #f1f1f1;
        }

        .brand {
            display: grid;
            gap: 4px;
        }

        .brand strong {
            font-size: 1.1rem;
        }

        .brand span,
        .section-subtitle,
        .muted {
            color: var(--muted);
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .badge,
        .button,
        .button-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 2px;
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

        main { padding: 16px; }

        .alert {
            margin-bottom: 16px;
            padding: 10px 12px;
            border-radius: 2px;
            border: 1px solid var(--line);
            background: #fafafa;
            color: var(--text);
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
            border-radius: 2px;
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
            border-radius: 2px;
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

        @media (max-width: 860px) {
            .form-grid { grid-template-columns: 1fr; }
            .field { grid-template-columns: 1fr; }

            .hero,
            .topbar { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="shell">
            <header class="topbar">
                <div class="brand">
                    <strong>Voedselbank</strong>
                    <span>Leveranciersbeheer</span>
                </div>

                <nav class="nav">
                    <a class="badge" href="{{ route('leveranciers.index') }}">Overzicht</a>
                    <a class="badge" href="{{ route('leveranciers.create') }}">Leverancier toevoegen</a>
                </nav>
            </header>

            <main>
                @if (session('status'))
                    <div class="alert">{{ session('status') }}</div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>