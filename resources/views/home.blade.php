<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voedselbank Maaskantje</title>
    <style>
        :root {
            --background: #f8f3ec;
            --surface: #ffffff;
            --text: #2f2a24;
            --muted: #73685c;
            --accent: #df7a17;
            --accent-dark: #bf650d;
            --accent-soft: #fff1e2;
            --line: #eadfce;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--text);
            background-color: var(--background);
        }

        .page {
            width: min(1000px, calc(100% - 32px));
            margin: 0 auto;
            padding: 24px 0 40px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 24px;
            margin-bottom: 28px;
            background-color: var(--surface);
            border: 1px solid var(--line);
            border-radius: 18px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            gap: 18px;
            color: var(--muted);
            font-size: 0.95rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .nav-links span {
            cursor: default;
            padding: 8px 12px;
            border-radius: 999px;
            background-color: var(--accent-soft);
        }

        .logo {
            width: 58px;
            height: 58px;
            flex: 0 0 auto;
        }

        .brand-text strong,
        .brand-text span {
            display: block;
        }

        .brand-text span {
            color: var(--muted);
            font-size: 0.85rem;
            font-weight: 400;
        }

        .hero {
            padding: 48px 36px;
            background-color: var(--surface);
            border: 1px solid var(--line);
            border-radius: 24px;
            text-align: left;
        }

        .hero small {
            display: block;
            margin-bottom: 14px;
            color: var(--accent);
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .hero h1 {
            margin: 0 0 16px;
            font-size: clamp(2rem, 5vw, 3.6rem);
            line-height: 1.1;
        }

        .hero p {
            max-width: 620px;
            margin: 0 0 24px;
            color: var(--muted);
            line-height: 1.7;
        }

        .button {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 10px;
            background-color: var(--accent);
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            box-shadow: 0 10px 22px rgba(223, 122, 23, 0.24);
        }

        .button:hover {
            background-color: var(--accent-dark);
        }

        .info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-top: 24px;
        }

        .info-card {
            padding: 22px;
            background-color: var(--surface);
            border: 1px solid var(--line);
            border-radius: 18px;
        }

        .info-card h2 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 1.15rem;
            color: var(--accent-dark);
        }

        .info-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.6;
        }

        footer {
            margin-top: 24px;
            text-align: center;
            color: var(--muted);
            font-size: 0.92rem;
        }

        @media (max-width: 640px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .nav-links {
                gap: 12px;
                justify-content: flex-start;
            }

            .hero {
                padding: 32px 24px;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <nav class="navbar">
            <div class="brand">
                <svg class="logo" viewBox="0 0 120 120" aria-hidden="true">
                    <path fill="#df7a17" d="M60 22c8-10 20-16 34-16 23 0 40 16 40 38 0 29-24 46-56 73L60 132l-18-15C10 90-14 73-14 44-14 22 3 6 26 6c14 0 26 6 34 16z" transform="translate(0 -12) scale(.88) translate(16 12)"/>
                    <path fill="#ffffff" d="M43 23c3 0 4 2 4 5l-1 34c0 3 2 5 5 5s5-2 5-5V23c0-3 2-5 5-5s5 2 5 5v39c0 3 2 5 5 5s5-2 5-5V23c0-3 2-5 5-5s5 2 5 5v40c0 3 2 5 5 5s5-2 5-5l-1-34c0-3 1-5 4-5 4 0 5 4 5 9l-1 41c0 16-8 28-18 37l-8 7H48l-8-7c-10-9-18-21-18-37l-1-41c0-5 1-9 5-9 3 0 4 2 4 5l-1 34c0 3 2 5 5 5s5-2 5-5V23c0-3 2-5 4-5z"/>
                </svg>
                <div class="brand-text">
                    <strong>Voedselbank Maaskantje</strong>
                    <span>Welkom op de homepagina</span>
                </div>
            </div>
            <div class="nav-links">
                <span>Klant registeren</span>
                <span>Leverancier registeren</span>
                <span>Allergie overzicht</span>
                <span>Voorraad overzicht</span>
                <span>Voedselpakketen aanmaken</span>
            </div>
        </nav>

        <section class="hero">
            <small>Welkom</small>
            <h1>Samen helpen we gezinnen in Maaskantje.</h1>
            <p>
                Een eenvoudige en rustige homepagina voor bezoekers die informatie zoeken
                over hulp, doneren of vrijwilligerswerk.
            </p>
            <a class="button" href="#">Bekijk informatie</a>
        </section>

        <section class="info">
            <article class="info-card">
                <h2>Hulp aanvragen</h2>
                <p>Bekijk rustig hoe ondersteuning werkt en welke stappen erbij horen.</p>
            </article>

            <article class="info-card">
                <h2>Doneren</h2>
                <p>Met voedsel of een bijdrage help je direct mensen uit de omgeving.</p>
            </article>

            <article class="info-card">
                <h2>Vrijwilligers</h2>
                <p>Word onderdeel van een betrokken team dat samen het verschil maakt.</p>
            </article>
        </section>

        <footer>
            Voedselbank Maaskantje | Dorpsstraat 1 | info@voedselbankmaaskantje.nl
        </footer>
    </main>
</body>
</html>
