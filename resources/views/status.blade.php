@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
        color: #f8f9fa;
    }
    h2 {
        color: #00e1ff;
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
    .btn-primary {
        background-color: #007bff;
        border: none;
    }
</style>

<div class="container mt-5 py-5">
    <h2 class="text-center mb-4">📊 Statut du robot</h2>

    <div class="card shadow p-4">
        <ul class="list-group">
            <li class="list-group-item">Direction : <strong id="direction">–</strong></li>
            <li class="list-group-item">Batterie : <strong id="battery">–</strong></li>
            <li class="list-group-item">Température : <strong id="temperature">–</strong></li>
            <li class="list-group-item">Mis à jour : <strong id="last_updated">–</strong></li>
        </ul>
    </div>

    <div class="text-center mt-4">
        <a href="/control" class="btn btn-primary me-2">🎮 Contrôle</a>
        <a href="/home" class="btn btn-primary">🏠 Accueil</a>
    </div>
</div>

<script>
function chargerStatus() {
    fetch('http://127.0.0.1:5000/api/status')
        .then(response => response.json())
        .then(data => {
            document.getElementById("direction").textContent = data.direction;
            document.getElementById("battery").textContent = data.battery;
            document.getElementById("temperature").textContent = data.temperature;
            document.getElementById("last_updated").textContent = new Date().toLocaleTimeString();
        })
        .catch(error => {
            console.error("Erreur lors de la récupération du statut :", error);
        });
}

chargerStatus();
setInterval(chargerStatus, 3000);
</script>
@endsection
