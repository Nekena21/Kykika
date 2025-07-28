<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class StatusController extends Controller
{
    public function index()
    {
        // Requête vers Flask pour récupérer le statut
        $response = Http::get('http://127.0.0.1:5000/api/status');

        if ($response->ok()) {
            $status = $response->json();
        } else {
            $status = [
                'direction' => 'stop',
                'battery' => '82%',
                'temperature' => '35°C',
                'last_updated' => now()->toDateTimeString()
            ];
        }

        return view('status', compact('status'));
    }
}
