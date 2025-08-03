@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

<style>

    /* === Hero Section === */
    .hero-section {
        background: linear-gradient(to right, #001f1f, #001111);
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding-top: 100px;
        padding-bottom: 100px;
        text-align: center;
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 700;
        color: #00ff99;
    }

    .lead {
        font-size: 1.25rem;
        color: #c2fff1;
    }

    /* === Boutons === */
    .btn-neon {
        background: none;
        border: 2px solid #00ff99;
        color: #00ff99;
        padding: 10px 25px;
        font-weight: bold;
        border-radius: 30px;
        transition: 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-neon:hover {
        background-color: #00ff99;
        color: #000;
        box-shadow: 0 0 10px #00ff99, 0 0 20px #00ff99;
    }

    .btn-section {
        margin-top: 30px;
    }

    /* === Section Générale === */
    .section {
        padding: 100px 20px;
        border-top: 1px solid #00ffcc22;
    }

    .section h2 {
        color: #00ffcc;
        margin-bottom: 40px;
        font-size: 2rem;
        text-align: center;
    }

    .section-divider {
        height: 3rem;
    }

    /* === Cartes de fonctionnalités === */
    .card-feature {
        background-color: #111;
        border: 1px solid #00ffcc33;
        border-radius: 12px;
        padding: 20px;
        margin: 15px 0;
        box-shadow: 0 0 10px #00ffcc22;
        transition: transform 0.3s;
    }

    .card-feature:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 20px #00ffcc55;
    }
</style>

<!-- === Hero Section === -->
<div id="hero" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 text-md-start text-center">
                <h1 class="hero-title">Bienvenue {{ Auth::user()->name }} 👋</h1>
                <p class="lead">Ton robot est prêt à recevoir tes commandes intelligentes !</p>

                <div class="btn-section">
                    <a href="{{ url('/control') }}" class="btn btn-neon me-3 mb-2">⚙️ Contrôler le robot</a>
                    <a href="{{ url('/status') }}" class="btn btn-neon me-3 mb-2">📊 Statut du robot</a>
                    <a href="#" class="btn btn-neon mb-2">🔗 Connexion au robot</a>
                </div>
            </div>
            <div class="col-md-5 text-center d-none d-md-block">
                <img src="{{ asset('IMG/PetitGars.png') }}" class="img-fluid" style="max-height: 300px;" alt="Robot">
            </div>
        </div>
    </div>
</div>

<div class="section-divider"></div>

<!-- === À propos === -->
<section id="about" class="section container">
    <h2>À propos du projet</h2>
    <div class="card-feature">
        <p>
            Ce projet est né de la volonté de rendre la robotique plus accessible aux jeunes à travers un système éducatif intelligent.
            Nous utilisons un robot équipé d’ESP32, contrôlé à distance, et relié à une interface web Laravel/Flask sécurisée.
        </p>
    </div>
</section>

<!-- === Fonctionnalités === -->
<section id="features" class="section container">
    <h2>Fonctionnalités clés</h2>

    <div class="card-feature">
        <h4>🧠 Interface intelligente</h4>
        <p>Contrôle temps réel via web. Sécurité avec authentification utilisateur.</p>
    </div>

    <div class="card-feature">
        <h4>📡 Capteurs multiples</h4>
        <p>Ultrason, infrarouge, température... pour analyser l’environnement.</p>
    </div>

    <div class="card-feature">
        <h4>🤖 Robot éducatif</h4>
        <p>Base mobile programmée, moteurs pilotés, logique personnalisable.</p>
    </div>
</section>

<!-- === Contact === -->
<section id="contact" class="section container">
    <h2>Contact & Démo</h2>
    <div class="card-feature text-center">
        <p>Vous souhaitez tester le système ou nous poser des questions ?</p>
        <a href="mailto:safidy2121@gmail.com?subject=Demande de démo&body=Bonjour, je souhaite en savoir plus sur votre robot." class="btn btn-neon mt-3">Envoyer un email</a>
    </div>
</section>

@endsection
