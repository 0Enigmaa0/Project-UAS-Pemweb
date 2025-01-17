@extends('layouts.app')

@section ('fullwidth')
    <!-- Hero Section -->
    <div class="hero text-center">
        <h1 class="display-4 fw-bold">Selamat Datang di Dashboard!</h1>
        <p class="lead">Kelola aktivitas belajar Anda dan jelajahi pertanyaan komunitas.</p>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Statistik Komunitas -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Total Pertanyaan Komunitas</h5>
                        <p class="display-5 fw-bold">{{ $totalQuestions }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Total Pengguna</h5>
                        <p class="display-5 fw-bold">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Total Jawaban Komunitas</h5>
                        <p class="display-5 fw-bold">{{ $totalAnswers }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Pengguna -->
        @auth
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Total Pertanyaan Anda</h5>
                        <p class="display-5 fw-bold">{{ $userQuestions }}</p>
                        <a href="{{ route('questions.ask') }}" class="btn btn-primary btn-sm">Ajukan Pertanyaan Baru</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Total Jawaban Anda</h5>
                        <p class="display-5 fw-bold">{{ $userAnswers }}</p>
                        <a href="{{ route('questions.trending') }}" class="btn btn-primary btn-sm">Lihat Pertanyaan Tren</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Profil Anda</h5>
                        <p class="display-6 fw-bold">{{ Auth::user()->name }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endauth

        <!-- Pertanyaan Terbaru -->
        <div class="py-5">
            <h2 class="text-center fw-bold mb-4">Pertanyaan Terbaru dari Komunitas</h2>
            @if($questions->isNotEmpty())
            <div class="row g-4">
                @foreach($questions as $question)
                <div class="col-md-4">
                    <div class="card feature-card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $question->title }}</h5>
                            <p class="card-text text-muted">
                                {{ $question->category }} • {{ $question->created_at->diffForHumans() }}
                            </p>
                            <a href="{{ route('questions.detail', ['id' => $question->id]) }}" class="stretched-link">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center text-muted">Belum ada pertanyaan dari komunitas.</p>
            @endif
        </div>
    </div>
@endsection