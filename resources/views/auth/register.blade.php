@extends('layouts.app')

@section('content')
<style>
    .login-hero {
        min-height: 100vh;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .login-card-minimal {
        background: rgba(0,0,0,0.15);
        border: 2px solid #fff;
        border-radius: 18px;
        box-shadow: 0 4px 32px 0 rgba(0,0,0,0.10);
        padding: 2.5rem 2rem 2rem 2rem;
        width: 100%;
        max-width: 400px;
        backdrop-filter: blur(2px);
    }
    .form-control-minimal {
        border-radius: 12px;
        font-size: 1.1rem;
        padding: 0.9rem 1.1rem;
        border: none;
        margin-bottom: 1.2rem;
        background: #fff;
        box-shadow: 0 1px 4px rgba(0,0,0,0.04);
    }
    .btn-minimal {
        border-radius: 12px;
        font-size: 1.1rem;
        padding: 0.9rem 1.1rem;
        font-weight: 600;
        background: #2196f3;
        border: none;
        width: 100%;
        color: #fff;
        margin-bottom: 1.1rem;
        transition: background 0.2s;
    }
    .btn-minimal:hover {
        background: #1769aa;
    }
    .register-link {
        color: #fff;
        text-align: center;
        display: block;
        text-decoration: none;
        font-size: 1rem;
        margin-top: 0.5rem;
    }
    .register-link:hover {
        text-decoration: underline;
        color: #bbdefb;
    }
    label.form-label {
        color: #fff;
        font-weight: 500;
        margin-bottom: 0.3rem;
    }
</style>
<div class="login-hero" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/hero.webp') }}');">
    <div class="login-card-minimal">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name" class="form-label">Nama</label>
            <input id="name" type="text" class="form-control form-control-minimal" name="name" value="{{ old('name') }}" required autofocus>
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control form-control-minimal" name="email" value="{{ old('email') }}" required>
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control form-control-minimal" name="password" required autocomplete="new-password">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" class="form-control form-control-minimal" name="password_confirmation" required>
            <button type="submit" class="btn btn-minimal">DAFTAR</button>
        </form>
        <a href="{{ route('login') }}" class="register-link">Sudah punya akun? Login disini</a>
    </div>
</div>
@endsection
