@extends('layouts.app')

@push('styles')
<style>
    label {
        color: #00ffcc;
        font-weight: 500;
        text-shadow: 0 0 5px #00ffcc;
    }
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
    }

    .form-control {
        background-color: #121212;
        color: #ffffff;
        border: 1px solid #00ffcc;
    }

    .form-control:focus {
        border-color: #00ffcc;
        box-shadow: 0 0 10px #00ffcc;
        background-color: #1a1a1a;
        color: #ffffff;
    }

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

    a.btn-link {
        color: #00ffcc;
        text-shadow: 0 0 5px #00ffcc;
    }

    a.btn-link:hover {
        color: #ffffff;
    }
    /* .register-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    } */

</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already have an account?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
