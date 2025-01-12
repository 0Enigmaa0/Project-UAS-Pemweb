@extends('layouts.app') <!-- Pastikan menggunakan layout utama -->

@section('content')
<div class="hero text-center mb-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang Kembali!</h1>
        <p class="lead mb-4">Masuk untuk melanjutkan perjalanan belajarmu!</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Masuk ke Akun Anda</h2>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" id="remember" name="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Ingat Saya</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Masuk</button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p>Belum punya akun? <a href="{{ route('register') }}" class="text-primary">Daftar di sini</a>.</p>
                        <p><a href="{{ route('password.request') }}" class="text-primary">Lupa kata sandi?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
