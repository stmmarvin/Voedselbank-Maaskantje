<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voedselbank Maaskantje</title>
    <style>
        :root {
            --background: #f7f3ee;
            --surface: #ffffff;
            --text: #243028;
            --muted: #69756b;
            --accent: #6d8b5a;
            --line: #e7e1d8;
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
            font-size: 1.1rem;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            gap: 18px;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .nav-links span {
            cursor: default;
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
                flex-wrap: wrap;
                gap: 12px;
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
            <div class="brand">Voedselbank Maaskantje</div>
            <div class="nav-links">
                <span>Home</span>
                <span>Over ons</span>
                <span>Hulp</span>
                <span>Contact</span>
            </div>
        </nav>

        <section class="hero">
            <small>Welkom</small>
            <h1>Samen helpen we gezinnen in Maaskantje.</h1>
            <p>
                Een eenvoudige en rustige homepagina voor bezoekers die informatie zoeken
                over hulp, doneren of vrijwilligerswerk.
            </p>
            <a class="button" href="#">Lees meer</a>
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
