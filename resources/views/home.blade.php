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
            padding: 0 24px;
            margin-bottom: 28px;
            background-color: var(--surface);
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
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
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
            align-items: center;
            margin-left: auto;
            padding: 14px 0;
        }

        .nav-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 56px;
            padding: 0 18px;
            text-align: center;
            white-space: normal;
            color: var(--text);
            font-size: 0.92rem;
            font-weight: 700;
            text-decoration: none;
            line-height: 1.2;
            border: 1px solid rgba(223, 122, 23, 0.12);
            border-radius: 14px;
            background: linear-gradient(180deg, #fffdfa 0%, #fff4e8 100%);
            box-shadow: 0 8px 20px rgba(223, 122, 23, 0.08);
            transition: background-color 0.18s ease, color 0.18s ease, transform 0.18s ease, box-shadow 0.18s ease;
        }

        .nav-links a:hover {
            background: linear-gradient(180deg, #fff8ef 0%, #ffe7cb 100%);
            color: var(--accent-dark);
            transform: translateY(-1px);
            box-shadow: 0 12px 24px rgba(223, 122, 23, 0.14);
        }

        .nav-links a.active {
            background-color: var(--accent);
            color: #ffffff;
            background: linear-gradient(180deg, #f08a18 0%, #df7a17 100%);
            border-color: rgba(191, 101, 13, 0.25);
            box-shadow: 0 14px 28px rgba(223, 122, 23, 0.24);
        }

        .nav-search {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            min-height: 56px;
            color: var(--text);
            margin-left: 12px;
            border: 1px solid rgba(223, 122, 23, 0.12);
            border-radius: 14px;
            background: linear-gradient(180deg, #fffdfa 0%, #fff4e8 100%);
            box-shadow: 0 8px 20px rgba(223, 122, 23, 0.08);
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
                padding: 18px;
                gap: 16px;
            }

            .nav-links {
                width: 100%;
                justify-content: flex-start;
                margin-left: 0;
                padding: 0;
            }

            .nav-links a {
                min-height: 52px;
                padding: 10px 14px;
            }

            .nav-search {
                width: 56px;
                min-height: 56px;
                border: 1px solid var(--line);
                border-radius: 14px;
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
                <a class="active" href="#">Home</a>
                <a href="#">Klant registeren</a>
                <a href="#">Leverancier registeren</a>
                <a href="#">Allergie overzicht</a>
                <a href="#">Voorraad overzicht</a>
                <a href="#">Voedselpakketten aanmaken</a>
            </div>
            <div class="nav-search" aria-hidden="true">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                    <circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="2.5"/>
                    <path d="M16 16L21 21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
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
