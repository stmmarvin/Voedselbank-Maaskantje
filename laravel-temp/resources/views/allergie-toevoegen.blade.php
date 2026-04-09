<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergie Toevoegen | Voedselbank Maaskantje</title>
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
            --success-bg: #ebf6ed;
            --success-text: #35643d;
            --error-bg: #fff1e7;
            --error-text: #8a3e18;
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
            width: min(980px, calc(100% - 32px));
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

        .ghost-button,
        .submit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 0 18px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
        }

        .ghost-button {
            color: var(--accent-dark);
            background-color: var(--accent-soft);
        }

        .submit-button {
            color: #ffffff;
            background: linear-gradient(180deg, #f08a18 0%, var(--accent) 100%);
            border: 0;
            box-shadow: 0 14px 28px rgba(223, 122, 23, 0.22);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.94);
            border: 1px solid var(--line);
            border-radius: 22px;
            box-shadow: 0 24px 48px rgba(115, 104, 92, 0.10);
            padding: 32px;
            position: relative;
            overflow: hidden;
        }

        .card::after {
            content: "";
            position: absolute;
            right: -52px;
            top: -56px;
            width: 190px;
            height: 190px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(223, 122, 23, 0.16) 0%, rgba(223, 122, 23, 0) 72%);
        }

        .eyebrow {
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

        h1 {
            margin: 0 0 12px;
            font-size: clamp(2rem, 4vw, 3rem);
            line-height: 1.08;
        }

        .lead {
            margin: 0 0 28px;
            color: var(--muted);
            line-height: 1.7;
        }

        .message {
            margin-bottom: 20px;
            padding: 16px 18px;
            border-radius: 16px;
            line-height: 1.6;
        }

        .message.success {
            color: var(--success-text);
            background-color: var(--success-bg);
        }

        .message.error {
            color: var(--error-text);
            background-color: var(--error-bg);
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: rgba(223, 122, 23, 0.45);
            box-shadow: 0 0 0 4px rgba(223, 122, 23, 0.12);
        }

        .form-grid {
            display: grid;
            gap: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
        }

        input,
        select {
            width: 100%;
            min-height: 54px;
            padding: 0 16px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background-color: #fffdfa;
            color: var(--text);
            font: inherit;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        @media (max-width: 640px) {
            .header-top,
            .header-bottom {
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

            .card {
                padding: 22px;
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
                        <span>Allergie toevoegen</span>
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

        <section class="card">
            <span class="eyebrow">Beheer</span>
            <h1>Nieuwe allergie registreren.</h1>
            <p class="lead">
                Voeg hier een nieuwe allergie toe aan de tabel <code>Allergie</code>.
                Na opslaan kun je de nieuwe regel terugzien in je database en later koppelen aan klanten.
            </p>

            <?php if (! empty($formSuccess)): ?>
                <div class="message success"><?= htmlspecialchars($formSuccess, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>

            <?php if (! empty($formError)): ?>
                <div class="message error"><?= htmlspecialchars($formError, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>

            <form method="post" action="/allergie-toevoegen" class="form-grid">
                <div>
                    <label for="naam">Naam van de allergie</label>
                    <input
                        id="naam"
                        name="naam"
                        type="text"
                        maxlength="100"
                        value="<?= htmlspecialchars($_POST['naam'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="Bijvoorbeeld: Pinda"
                        required
                    >
                </div>

                <div>
                    <label for="ernst">Ernst</label>
                    <select id="ernst" name="ernst">
                        <?php $currentErnst = $_POST['ernst'] ?? ''; ?>
                        <option value=""<?= $currentErnst === '' ? ' selected' : '' ?>>Niet opgegeven</option>
                        <option value="Laag"<?= $currentErnst === 'Laag' ? ' selected' : '' ?>>Laag</option>
                        <option value="Gemiddeld"<?= $currentErnst === 'Gemiddeld' ? ' selected' : '' ?>>Gemiddeld</option>
                        <option value="Hoog"<?= $currentErnst === 'Hoog' ? ' selected' : '' ?>>Hoog</option>
                    </select>
                </div>

                <div class="actions">
                    <button class="submit-button" type="submit">Allergie opslaan</button>
                    <a class="ghost-button" href="/allergie-overzicht">Annuleren</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
