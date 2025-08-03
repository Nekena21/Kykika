@extends('layouts.app')

@push('styles')
<style>
    /* === Labels === */
    label {
        color: #00ffcc;
        font-weight: 500;
        text-shadow: 0 0 5px #00ffcc;
    }

    /* === Carte principale === */
    .card {
        background-color: #1f1f1f;
        border: 1px solid #00ffcc;
        box-shadow: 0 0 15px rgba(0, 255, 204, 0.2);
    }

    .card-header {
        background-color: #121212;
        color: #00ffcc;
        font-weight: bold;
        text-shadow: 0 0 5px #00ffcc;
        text-align: center;
        font-size: 1.5rem;
    }

    /* === Champs de formulaire === */
    .form-control {
        background-color: #121212;
        color: #ffffff;
        border: 1px solid #00ffcc;
    }

    .form-control:focus {
        border-color: #00ffcc;
        box-shadow: 0 0 10px #00ffcc;
        background-color: #1a1a1a;
    }

    /* === Bouton de connexion === */
    .btn-primary {
        background-color: #00ffcc;
        border: none;
        color: #000;
        font-weight: bold;
        box-shadow: 0 0 10px #00ffcc;
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #00ccaa;
        box-shadow: 0 0 20px #00ffcc;
        transform: scale(1.05);
    }

    /* === Lien "Mot de passe oublié" === */
    a.btn-link {
        color: #00ffcc;
        text-shadow: 0 0 5px #00ffcc;
    }

    a.btn-link:hover {
        color: #ffffff;
    }
</style>
@endpush

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- === Carte de Connexion === -->
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- === Champ Email === -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                {{ __('Email Address') }}
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- === Champ Mot de passe === -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">
                                {{ __('Password') }}
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- === Case à cocher "Se souvenir de moi" === -->
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- === Bouton et lien mot de passe oublié === -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->

        </div>
    </div>
</div>
@endsection
