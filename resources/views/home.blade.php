@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <h1 class="mb-4">Bienvenue dans le système de contrôle du robot</h1>
        <div class="d-grid gap-3 col-6 mx-auto">
            <a href="{{ url('/control') }}" class="btn btn-primary btn-lg">⚙️ Contrôler le robot</a>
            <a href="{{ url('/status') }}" class="btn btn-secondary btn-lg">📊 Voir l’état du robot</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg mt-4">🚪 Se déconnecter</button>
            </form>
        </div>
    </div>
</div>
@endsection
