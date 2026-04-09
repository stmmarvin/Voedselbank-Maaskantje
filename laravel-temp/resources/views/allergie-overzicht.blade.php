<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergie Overzicht | Voedselbank Maaskantje</title>
    <style>
        :root {
            --background: #f8f3ec;
            --surface: #ffffff;
            --surface-soft: #fff8f0;
            --text: #2f2a24;
            --muted: #73685c;
            --accent: #df7a17;
            --accent-dark: #bf650d;
            --accent-soft: #fff1e2;
            --line: #eadfce;
            --success: #4b7a52;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top right, rgba(223, 122, 23, 0.12), transparent 28%),
                linear-gradient(180deg, #fbf7f1 0%, var(--background) 100%);
        }

        .page {
            width: min(1120px, calc(100% - 32px));
            margin: 0 auto;
            padding: 24px 0 40px;
        }

        .site-header {
            width: 100%;
            margin-bottom: 28px;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 92px;
            padding: 0 28px;
            background: #f56400;
            color: #ffffff;
        }

        .header-bottom {
            display: flex;
            align-items: center;
            padding: 0 28px;
            min-height: 110px;
            background-color: #ffffff;
            border-bottom: 2px solid #f3eadb;
        }

        .header-inner {
            width: min(1600px, calc(100% - 64px));
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 1rem;
            font-weight: 700;
        }

        .logo {
            width: 52px;
            height: 52px;
            flex: 0 0 auto;
        }

        .brand-text strong,
        .brand-text span {
            display: block;
        }

        .brand-text strong {
            display: none;
        }

        .brand-text span {
            color: transparent;
            font-size: 0;
            font-weight: 400;
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
            font-size: 0.87rem;
            font-weight: 400;
        }

        .header-user a {
            color: #ffffff;
            text-decoration: underline;
            text-underline-offset: 4px;
        }

        .header-title {
            display: inline-flex;
            align-items: center;
            color: #cc5612;
            font-size: 1.15rem;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 34px;
            flex-wrap: wrap;
            margin-right: auto;
            margin-left: 34px;
        }

        .header-nav a {
            display: inline-flex;
            align-items: center;
            min-height: 40px;
            padding: 0;
            color: var(--text);
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 700;
            border-radius: 0;
            transition: color 0.18s ease;
            white-space: nowrap;
        }

        .header-nav a:hover,
        .header-nav a.active {
            color: #cc5612;
            background-color: transparent;
        }

        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1.3fr) minmax(280px, 0.7fr);
            gap: 22px;
            margin-bottom: 24px;
        }

        .hero-card,
        .hero-side {
            background-color: var(--surface);
            border: 1px solid var(--line);
            border-radius: 24px;
            box-shadow: 0 18px 40px rgba(115, 104, 92, 0.08);
        }

        .hero-card {
            padding: 38px 34px;
        }

        .hero-card small {
            display: inline-block;
            margin-bottom: 14px;
            padding: 8px 12px;
            color: var(--accent-dark);
            background-color: var(--accent-soft);
            border-radius: 999px;
            font-weight: 700;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .hero-card h1 {
            margin: 0 0 14px;
            font-size: clamp(2rem, 4vw, 3.2rem);
            line-height: 1.08;
        }

        .hero-card p {
            margin: 0;
            max-width: 680px;
            color: var(--muted);
            line-height: 1.7;
        }

        .hero-side {
            padding: 26px;
            background: linear-gradient(180deg, var(--surface-soft) 0%, var(--surface) 100%);
        }

        .hero-side h2 {
            margin: 0 0 10px;
            font-size: 1.1rem;
            color: var(--accent-dark);
        }

        .hero-side p {
            margin: 0 0 18px;
            color: var(--muted);
            line-height: 1.6;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            padding: 10px 14px;
            border-radius: 999px;
            background-color: #fff5e9;
            color: var(--accent-dark);
            font-weight: 700;
        }

        .content {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 300px;
            gap: 24px;
        }

        .panel {
            background-color: var(--surface);
            border: 1px solid var(--line);
            border-radius: 24px;
            box-shadow: 0 18px 40px rgba(115, 104, 92, 0.08);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 24px 24px 0;
        }

        .panel-header h2 {
            margin: 0;
            font-size: 1.4rem;
        }

        .panel-header p {
            margin: 6px 0 0;
            color: var(--muted);
        }

        .add-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            border-radius: 14px;
            background-color: var(--accent);
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            white-space: nowrap;
        }

        .table-wrap {
            padding: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 18px;
            border: 1px solid var(--line);
        }

        thead th {
            padding: 16px 18px;
            text-align: left;
            font-size: 0.86rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--muted);
            background-color: #fcf7f0;
        }

        tbody td {
            padding: 18px;
            border-top: 1px solid var(--line);
            vertical-align: top;
        }

        tbody tr:nth-child(even) {
            background-color: #fffdfa;
        }

        .allergy-name {
            font-weight: 700;
            font-size: 1.02rem;
        }

        .meta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 10px;
            border-radius: 999px;
            background-color: var(--accent-soft);
            color: var(--accent-dark);
            font-size: 0.82rem;
            font-weight: 700;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 7px 10px;
            border-radius: 999px;
            background-color: #ebf6ed;
            color: var(--success);
            font-size: 0.82rem;
            font-weight: 700;
        }

        .empty-state,
        .error-state {
            margin: 24px;
            padding: 20px;
            border-radius: 18px;
            line-height: 1.6;
        }

        .empty-state {
            color: var(--muted);
            background-color: #fffaf4;
            border: 1px dashed var(--line);
        }

        .error-state {
            color: #8a3e18;
            background-color: #fff1e7;
            border: 1px solid #f0c4a4;
        }

        .sidebar {
            display: grid;
            gap: 18px;
        }

        .sidebar-card {
            padding: 22px;
            background-color: var(--surface);
            border: 1px solid var(--line);
            border-radius: 20px;
            box-shadow: 0 18px 40px rgba(115, 104, 92, 0.08);
        }

        .sidebar-card h3 {
            margin: 0 0 10px;
            font-size: 1.05rem;
            color: var(--accent-dark);
        }

        .sidebar-card p,
        .sidebar-card li {
            color: var(--muted);
            line-height: 1.6;
        }

        .sidebar-card ul {
            margin: 0;
            padding-left: 18px;
        }

        footer {
            margin-top: 24px;
            text-align: center;
            color: var(--muted);
            font-size: 0.92rem;
        }

        @media (max-width: 900px) {
            .hero,
            .content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .header-top,
            .header-bottom,
            .panel-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-inner {
                width: min(100%, calc(100% - 24px));
                align-items: flex-start;
            }

            .header-bottom {
                padding-top: 18px;
                padding-bottom: 18px;
                min-height: auto;
            }

            .header-nav {
                gap: 18px;
                margin-left: 0;
            }

            .hero-card,
            .hero-side,
            .table-wrap,
            .sidebar-card {
                padding-left: 20px;
                padding-right: 20px;
            }

            .page {
                width: min(100%, calc(100% - 20px));
            }

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead {
                display: none;
            }

            tbody td {
                padding: 10px 0;
                border-top: 0;
            }

            tbody tr {
                padding: 16px 0;
                border-top: 1px solid var(--line);
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-top">
            <div class="header-inner">
                <div class="brand">
                    <svg class="logo" viewBox="0 0 120 120" aria-hidden="true">
                        <circle cx="60" cy="60" r="58" fill="#ffffff"/>
                        <path fill="#ee6200" d="M40 36h10v13h20V36h10v19c0 6-4 11-10 13v16h-8V70H58v14h-8V68c-6-2-10-7-10-13V36z"/>
                    </svg>
                    <div class="brand-text">
                        <strong>Voedselbank Maaskantje</strong>
                        <span>Allergie overzicht</span>
                    </div>
                </div>
                <div class="header-user">
                    <span>Mohammed@gmail.com</span>
                    <a href="#">Uitloggen</a>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="header-inner">
                <a class="header-title" href="/allergie-overzicht">Mijn Overzicht</a>
                <nav class="header-nav" aria-label="Hoofdnavigatie">
                    <a href="#">Informatie</a>
                    <a href="#">Voorraad</a>
                    <a class="active" href="/allergie-overzicht">Allergieen</a>
                    <a href="#">Leveranciers</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="page">

        <section class="hero">
            <article class="hero-card">
                <small>Beheer</small>
                <h1>Allergie overzicht voor klanten en voedselpakketten.</h1>
                <p>
                    Op deze pagina houd je snel bij welke allergieen bekend zijn, bij welke klanten ze horen
                    en welke aandacht nodig is bij het samenstellen van een veilig voedselpakket.
                </p>
            </article>

            <aside class="hero-side">
                <h2>Snelle status</h2>
                <p>Controleer in een oogopslag welke registraties actief zijn en waar extra alertheid nodig is.</p>
                <span class="pill"><?= (int) $allergyCount ?> geregistreerde allergieen</span>
            </aside>
        </section>

        <section class="content">
            <div class="panel">
                <div class="panel-header">
                    <div>
                        <h2>Bekende allergieen</h2>
                        <p>Een overzicht van geregistreerde allergieen binnen de voedselbank.</p>
                    </div>
                    <a class="add-button" href="/allergie-toevoegen">+ Allergie toevoegen</a>
                </div>

                <div class="table-wrap">
                    <?php if ($dbError): ?>
                        <div class="error-state">
                            <strong>Databaseverbinding mislukt.</strong><br>
                            Controleer je `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` en `DB_PASSWORD` in
                            `laravel-temp/.env`.<br>
                            Foutmelding: <?= htmlspecialchars($dbError, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    <?php elseif (empty($allergyRows)): ?>
                        <div class="empty-state">
                            Er zijn nog geen allergieen gevonden in `Klant_Allergie`.
                        </div>
                    <?php else: ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Allergie</th>
                                    <th>Ernst</th>
                                    <th>Klant</th>
                                    <th>Email</th>
                                    <th>Specifieke wensen</th>
                                    <th>Actie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allergyRows as $row): ?>
                                    <tr>
                                        <td><span class="meta"><?= htmlspecialchars($row['AllergieNaam'], ENT_QUOTES, 'UTF-8') ?></span></td>
                                        <td><?= htmlspecialchars($row['Ernst'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td>
                                            <?php if (! empty($row['GezinsNaam'])): ?>
                                                <div class="allergy-name"><?= htmlspecialchars($row['GezinsNaam'], ENT_QUOTES, 'UTF-8') ?></div>
                                                <div>Klantnummer: KL-<?= str_pad((string) $row['klant_id'], 3, '0', STR_PAD_LEFT) ?></div>
                                            <?php else: ?>
                                                <span class="empty-state" style="margin:0;padding:8px 10px;display:inline-flex;">Nog niet gekoppeld</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($row['Email'] ?: 'Nog niet gekoppeld', ENT_QUOTES, 'UTF-8') ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($row['SpecifiekeWensen'] ?: 'Geen extra wensen opgegeven', ENT_QUOTES, 'UTF-8') ?>
                                        </td>
                                        <td>
                                            <a class="add-button" href="/allergie-bewerken?id=<?= (int) $row['allergie_id'] ?>" style="padding:10px 14px;">
                                                Bewerken
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>

            <aside class="sidebar">
                <div class="sidebar-card">
                    <h3>Werkafspraak</h3>
                    <p>
                        Controleer altijd de klantkaart voordat een pakket wordt samengesteld en noteer wijzigingen direct.
                    </p>
                </div>

                <div class="sidebar-card">
                    <h3>Extra aandacht</h3>
                    <ul>
                        <li>Let op kruisbesmetting bij noten en gluten.</li>
                        <li>Controleer etiketten van donaties extra zorgvuldig.</li>
                        <li>Bespreek onduidelijkheden met de coordinator.</li>
                        <li><?= (int) $customerCount ?> klanten met geregistreerde allergieen geladen.</li>
                    </ul>
                </div>
            </aside>
        </section>

        <footer>
            Voedselbank Maaskantje | Dorpsstraat 1 | info@voedselbankmaaskantje.nl
        </footer>
    </main>
</body>
</html>
