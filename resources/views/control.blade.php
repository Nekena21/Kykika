@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h2 class="mb-4">🎮 Contrôle du robot éducatif</h2>

    <!-- 🟢 Bloc de statut en direct -->
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
    <div class="text-center mt-5">
        <a href="/home" class="btn btn-primary">Retour au tableau de bord</a>
        <a href="/status" class="btn btn-primary">Voir le statut</a>
    </div>
</div>

<script>
    function envoyerCommande(action) {
        fetch('http://127.0.0.1:5000/api/command', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: action })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('command-response').textContent = data.message || data.error;
            document.getElementById('command-response').classList.remove('d-none');
            chargerStatus(); // Mise à jour immédiate du statut
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

    // Actualisation toutes les 3 secondes
    setInterval(chargerStatus, 3000);
    chargerStatus();
</script>
@endsection
