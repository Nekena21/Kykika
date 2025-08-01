@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)),
                    url('{{ asset('IMG/IAFond.jpg') }}') no-repeat center center;
        background-size: cover;
        min-height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        color: white;
    }

    .hero-title {
        font-size: 2.8rem;
        font-weight: bold;
        color: #17a2b8 !important; /* text-info */
    }

    @media (min-width: 768px) {
        .hero-title {
            font-size: 4rem;
        }
    }

    .lead {
        color: #e0e0e0 !important; /* texte légèrement plus clair */
    }

    .btn-info {
        color: white;
    }
</style>

<div class="hero-section">
    <div class="container text-light">
        <div class="row align-items-center mb-5">
            <div class="col-md-7 text-md-start text-center">
                <h1 class="hero-title mb-3">
                    Salut {{ Auth::user()->name }} 👋
                </h1>
                <p class="lead">
                    Prêt à prendre le contrôle de ton robot intelligent ?
                </p>
                <div class="mt-4">
                    <a href="{{ url('/control') }}" class="btn btn-info btn-lg me-2 mb-2">
                        ⚙️ Contrôler le robot
                    </a>
                    <a href="{{ url('/status') }}" class="btn btn-outline-light btn-lg mb-2">
                        📄 Voir les journaux
                    </a>
                </div>
            </div>
            <div class="col-md-5 text-center d-none d-md-block">
                <img src="{{ asset('IMG/PetitGars.png') }}" alt="Robot" class="img-fluid" style="max-height: 250px;">
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card bg-dark bg-opacity-75 text-white border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">🔋 Statut du robot</h5>
                        <p class="card-text fs-5 mt-2">🟢 En ligne</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-dark bg-opacity-75 text-white border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">📡 Capteurs actifs</h5>
                        <p class="card-text fs-5 mt-2">Ultrason, Infrarouge</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-dark bg-opacity-75 text-white border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">🕹️ Dernière commande</h5>
                        <p class="card-text fs-5 mt-2">Avancer (il y a 2 min)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
