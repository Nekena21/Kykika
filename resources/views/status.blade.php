@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">📊 Statut du robot</h2>

    <div class="card shadow p-4">
        <ul class="list-group">
            <li class="list-group-item">Direction : <strong id="direction">–</strong></li>
            <li class="list-group-item">Batterie : <strong id="battery">–</strong></li>
            <li class="list-group-item">Température : <strong id="temperature">–</strong></li>
            <li class="list-group-item">Mis à jour : <strong id="last_updated">–</strong></li>
        </ul>
    </div>

    <div class="text-center mt-3">
        <a href="/control" class="btn btn-primary">Retour au contrôle</a>
        <a href="/home" class="btn btn-primary">Retour au tableau de bord</a>
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

// Charger immédiatement au démarrage
chargerStatus();
// Puis recharger toutes les 3 secondes
setInterval(chargerStatus, 3000);
</script>
@endsection
