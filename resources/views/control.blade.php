@extends('layouts.app')

@section('content')
<style>
    h2, h4 {
        color: #00e1ff; /* bleu néon */
    }
    .card {
        background-color: #1e1e2f;
        border: none;
        color: #ffffff;
    }
    .list-group-item {
        background-color: #2a2a3d;
        border: 1px solid #444;
        color: #ffffff;
    }
    .btn-lg {
        width: 150px;
    }
    .btn-success {
        background-color: #28a745;
        border: none;
    }
    .btn-warning {
        background-color: #ffc107;
        border: none;
    }
    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }
    .btn-danger {
        background-color: #dc3545;
        border: none;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
    }
    .alert-info {
        background-color: #17a2b8;
        color: #fff;
        border: none;
    }
</style>

<div class="container text-center mt-5 py-5">
    <h2 class="mb-4">🎮 Contrôle du robot éducatif</h2>

    <!-- Statut du robot -->
    <div class="card shadow mb-4 p-3">
        <h4>📊 Statut actuel du robot</h4>
        <ul class="list-group">
            <li class="list-group-item">Direction : <strong id="direction">{{ $status['direction'] }}</strong></li>
            <li class="list-group-item">Batterie : <strong id="battery">{{ $status['battery'] }}</strong></li>
            <li class="list-group-item">Température : <strong id="temperature">{{ $status['temperature'] }}</strong></li>
            <li class="list-group-item">Mis à jour : <span id="last_updated">{{ $status['last_updated'] }}</span></li>
        </ul>
    </div>

    <div id="command-response" class="alert alert-info d-none"></div>

    <!-- Boutons de commande -->
    <div class="d-flex justify-content-center flex-column align-items-center gap-3">
        <div>
            <button onclick="envoyerCommande('forward')" class="btn btn-success btn-lg">⬆️ Avancer</button>
        </div>

        <div class="d-flex gap-4">
            <button onclick="envoyerCommande('left')" class="btn btn-warning btn-lg">⬅️ Gauche</button>
            <button onclick="envoyerCommande('stop')" class="btn btn-secondary btn-lg">⏹️ Stop</button>
            <button onclick="envoyerCommande('right')" class="btn btn-warning btn-lg">➡️ Droite</button>
        </div>

        <div>
            <button onclick="envoyerCommande('backward')" class="btn btn-danger btn-lg">⬇️ Reculer</button>
        </div>
    </div>

    <!-- Liens -->
    <div class="text-center mt-5">
        <a href="/home" class="btn btn-primary">🏠 Tableau de bord</a>
        <a href="/status" class="btn btn-primary">📋 Voir le statut</a>
    </div>
</div>

<script>
    function envoyerCommande(action) {
        fetch('http://127.0.0.1:5000/api/command', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: action })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('command-response').textContent = data.message || data.error;
            document.getElementById('command-response').classList.remove('d-none');
            chargerStatus();
        })
        .catch(error => {
            document.getElementById('command-response').textContent = "Erreur de communication avec le robot.";
            document.getElementById('command-response').classList.remove('d-none');
            console.error(error);
        });
    }

    function chargerStatus() {
        fetch('http://127.0.0.1:5000/api/status')
        .then(res => res.json())
        .then(data => {
            document.getElementById("direction").textContent = data.direction;
            document.getElementById("battery").textContent = data.battery;
            document.getElementById("temperature").textContent = data.temperature;
            document.getElementById("last_updated").textContent = new Date().toLocaleTimeString();
        })
        .catch(error => {
            console.error("Erreur statut :", error);
        });
    }

    // setInterval(chargerStatus, 3000);
    // chargerStatus();
</script>
@endsection
