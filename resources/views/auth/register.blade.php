@extends('layouts.app') <!-- Menggunakan layout utama -->

@section('content')
<!-- Hero Section -->
<div class="hero text-center mb-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Buat Akun Baru!</h1>
        <p class="lead mb-4">Bergabunglah dengan komunitas belajar kami dan mulai perjalanan belajarmu!</p>
    </div>
</div>

<!-- Form Register -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Daftar Akun Baru</h2>

                    <!-- Alert jika ada pesan -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Form Register -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Kata Sandi -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Konfirmasi Kata Sandi -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>

                        <!-- Tombol Daftar -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Daftar</button>
                        </div>
                    </form>

                    <!-- Link ke Login -->
                    <div class="text-center mt-4">
                        <p>Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Masuk di sini</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
