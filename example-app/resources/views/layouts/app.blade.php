<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <style>
        :root {
            --bg: #07111f;
            --panel: rgba(15, 23, 42, 0.92);
            --panel-2: rgba(30, 41, 59, 0.92);
            --text: #e5eefc;
            --muted: #9fb0ca;
            --line: rgba(148, 163, 184, 0.18);
            --accent: #38bdf8;
            --accent-strong: #0ea5e9;
            --success: #34d399;
            --danger: #fb7185;
            --warning: #fbbf24;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(56, 189, 248, 0.16), transparent 28%),
                radial-gradient(circle at top right, rgba(52, 211, 153, 0.12), transparent 32%),
                linear-gradient(180deg, #05101d 0%, #0b1320 55%, #060b14 100%);
            color: var(--text);
            min-height: 100vh;
        }

        a { color: inherit; text-decoration: none; }

        .page {
            max-width: 1180px;
            margin: 0 auto;
            padding: 32px 20px 48px;
        }

        .shell {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 22px 60px rgba(2, 6, 23, 0.45);
            backdrop-filter: blur(18px);
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 24px 28px;
            border-bottom: 1px solid var(--line);
        }

        .brand {
            display: grid;
            gap: 4px;
        }

        .brand strong {
            font-size: 1.05rem;
            letter-spacing: 0.02em;
        }

        .brand span,
        .section-subtitle,
        .muted {
            color: var(--muted);
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .badge,
        .button,
        .button-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            font-weight: 600;
            border: 1px solid transparent;
            transition: transform 120ms ease, border-color 120ms ease, background-color 120ms ease;
        }

        .badge { padding: 8px 14px; background: rgba(148, 163, 184, 0.12); color: var(--text); }
        .button, .button-link { padding: 10px 16px; }
        .button:hover, .button-link:hover, .badge:hover { transform: translateY(-1px); }
        .button-primary { background: linear-gradient(135deg, var(--accent), var(--accent-strong)); color: #062033; }
        .button-secondary { background: rgba(148, 163, 184, 0.12); color: var(--text); border-color: var(--line); }
        .button-danger { background: rgba(251, 113, 133, 0.12); color: #fecdd3; border-color: rgba(251, 113, 133, 0.3); }

        main { padding: 28px; }

        .alert {
            margin-bottom: 24px;
            padding: 14px 16px;
            border-radius: 16px;
            border: 1px solid rgba(52, 211, 153, 0.28);
            background: rgba(16, 185, 129, 0.12);
            color: #d1fae5;
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
            margin-bottom: 22px;
        }

        .hero h1,
        .hero h2 {
            margin: 0 0 10px;
            font-size: clamp(1.8rem, 4vw, 3rem);
            line-height: 1.05;
        }

        .hero p { margin: 0; max-width: 60ch; color: var(--muted); }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .card {
            padding: 18px;
            border-radius: 20px;
            border: 1px solid var(--line);
            background: var(--panel-2);
        }

        .card-label { color: var(--muted); font-size: 0.92rem; }
        .card-value { font-size: 1.5rem; font-weight: 700; margin-top: 8px; }

        .panel {
            border: 1px solid var(--line);
            border-radius: 20px;
            overflow: hidden;
            background: rgba(2, 6, 23, 0.24);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 16px 18px;
            border-bottom: 1px solid var(--line);
            text-align: left;
            vertical-align: top;
        }

        .table th {
            color: #cbd5e1;
            font-size: 0.84rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            background: rgba(148, 163, 184, 0.08);
        }

        .table tr:last-child td { border-bottom: none; }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .stack { display: grid; gap: 14px; }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .field { display: grid; gap: 8px; }

        .field label {
            font-weight: 600;
            color: #dbe4f0;
        }

        .field input,
        .field textarea {
            width: 100%;
            padding: 12px 14px;
            border-radius: 14px;
            border: 1px solid rgba(148, 163, 184, 0.2);
            background: rgba(15, 23, 42, 0.88);
            color: var(--text);
            outline: none;
        }

        .field input:focus,
        .field textarea:focus {
            border-color: rgba(56, 189, 248, 0.8);
            box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.12);
        }

        .field textarea { min-height: 110px; resize: vertical; }

        .error {
            color: #fecaca;
            font-size: 0.92rem;
        }

        .form-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 8px;
        }

        .empty {
            padding: 32px 24px;
            text-align: center;
            color: var(--muted);
        }

        @media (max-width: 860px) {
            .cards,
            .form-grid { grid-template-columns: 1fr; }

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
                    <strong>Voedselbank Maaskantje</strong>
                    <span>Leveranciersbeheer met overzicht, toevoegen, bewerken en verwijderen</span>
                </div>

                <nav class="nav">
                    <a class="badge" href="{{ route('leveranciers.index') }}">Overzicht</a>
                    <a class="badge" href="{{ route('leveranciers.create') }}">Nieuwe leverancier</a>
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