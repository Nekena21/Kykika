<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Kykika – Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            margin: 0;
            background-image: url('{{ asset('IMG/technology.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.7);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            background-color: transparent;
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: #00ffcc;
            font-weight: bold;
            text-shadow: 0 0 5px #00ffcc;
        }

        .navbar-custom .nav-link:hover {
            color: #ffffff;
        }

        .content-center {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 3.5rem;
            text-shadow: 0 0 15px #00ffcc;
            margin-bottom: 1rem;
            color: #00ffcc;
        }

        h3 {
            font-size: 1.5rem;
            color: #ccc;
            margin-bottom: 2rem;
        }

        .btn-glow {
            background-color: #00ffcc;
            color: #000;
            font-weight: bold;
            border: none;
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
            box-shadow: 0 0 15px #00ffcc;
            transition: all 0.3s ease-in-out;
        }

        .btn-glow:hover {
            background-color: #00ccaa;
            box-shadow: 0 0 25px #00ffcc;
            transform: scale(1.05);
        }
        .navbar-toggler-icon {
            filter: invert(1) brightness(2);
        }
    </style>
</head>
<body>
    <div class="overlay">
        <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-custom py-3">
    <div class="container">
        <a class="navbar-brand" href="#">Kykika</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-2"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="#">Contact</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="#">FAQ</a></li>
            </ul>
        </div>
    </div>
</nav>


        <!-- Main Content -->
        <div class="content-center">
            <div>
                <h1>KykikaBot Control</h1>
                <h3>Explorez, surveillez et contrôlez vos robots à distance en toute sécurité</h3>
                <a href="{{ route('login') }}" class="btn btn-glow">Get Start →</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
