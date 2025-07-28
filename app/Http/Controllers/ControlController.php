<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlController extends Controller
{
public function index()
{
    // Exemple 1 : statut simulé localement
    $status = [
        'direction' => 'stop',
        'battery' => '82%',
        'temperature' => '35°C',
        'last_updated' => now()->toDateTimeString()
    ];

    return view('control', compact('status'));
}
}
