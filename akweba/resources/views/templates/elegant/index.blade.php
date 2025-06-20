<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }}</title>
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f7f7fa;
            color: #22223b;
            margin: 0;
            padding: 0;
        }
        header {
            background: #22223b;
            color: #fff;
            padding: 2rem 0 1rem 0;
            text-align: center;
        }
        nav {
            margin-top: 1rem;
        }
        nav a {
            color: #4ea8de;
            text-decoration: none;
            margin: 0 1rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        nav a:hover {
            color: #4361ee;
        }
        main {
            max-width: 600px;
            margin: 2rem auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(34,34,59,0.07);
            padding: 2rem;
        }
        h1 {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }
        h2 {
            font-size: 1.4rem;
            margin-top: 2rem;
            margin-bottom: 0.5rem;
            color: #22223b;
        }
        h3 {
            font-size: 1.1rem;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
        }
        a {
            color: #4361ee;
            text-decoration: underline;
        }
        .contact {
            margin-top: 2rem;
            padding: 1rem;
            background: #f1f3f8;
            border-radius: 8px;
        }
        footer {
            text-align: center;
            color: #888;
            font-size: 0.95rem;
            margin: 2rem 0 1rem 0;
        }
        @media (max-width: 700px) {
            main {
                padding: 1rem;
                margin: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>{{ $business->name }}</h1>
        <nav>
            <a href="#accueil">Accueil</a>
            <a href="#about">À propos</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>
    <main>
        <section id="accueil">
            <p>{{ $business->description }}</p>
        </section>
        <section id="about">
            <h2>À propos de nous</h2>
            <p>{{ $business->description }}</p>
        </section>
        <section id="contact" class="contact">
            <h2>Contactez-nous</h2>
            <div>{{ $business->address }}</div>
            <div>{{ $business->postal_code }} {{ $business->city }}</div>
            <div>{{ $business->country }}</div>
            <div><a href="tel:{{ $business->phone }}">{{ $business->phone }}</a></div>
            <div><a href="mailto:{{ $business->email }}">{{ $business->email }}</a></div>
        </section>
    </main>
    <footer>
        © {{ date('Y') }} {{ $business->name }}. Tous droits réservés.
    </footer>
</body>
</html> 