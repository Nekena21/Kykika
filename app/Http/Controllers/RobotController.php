<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RobotController extends Controller
{
    public function sendCommand(Request $request)
    {
        $command = $request->input('command');

        // 👉 Ici tu pourras appeler ton backend Flask via HTTP ou MQTT
        // Exemple : envoyer une requête HTTP à Flask
        // Http::post('http://localhost:5000/api/control', ['command' => $command]);

        // Pour l’instant on simule la commande
        return redirect('/control')->with('status', 'Commande envoyée : ' . $command);
    }
}
