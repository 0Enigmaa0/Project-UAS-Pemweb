<x-app-layout>
    <x-slot name="header">
        <div class="hero text-center">
            <div class="container">
                <h1 class="display-4 fw-bold">Selamat Datang di Dashboard!</h1>
                <p class="lead mb-4">Kelola aktivitas belajar Anda dan jelajahi pertanyaan komunitas.</p>
            </div>
        </div>
    </x-slot>

    <!-- Dashboard Content -->
    <div class="container py-5">
        <div class="row">
            <!-- Statistik Pengguna -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm feature-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Total Pertanyaan Anda</h5>
                        <p class="display-5 fw-bold">
                            {{ Auth::check() && Auth::user()->questions ? Auth::user()->questions->count() : 0 }}
                        </p>
                        <a href="{{ route('questions.ask') }}" class="btn btn-primary btn-sm">Ajukan Pertanyaan Baru</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm feature-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Total Jawaban Anda</h5>
                        <p class="display-5 fw-bold">
                            {{ Auth::check() && Auth::user()->answers ? Auth::user()->answers->count() : 0 }}
                        </p>
                        <a href="{{ route('questions.trending') }}" class="btn btn-primary btn-sm">Lihat Pertanyaan Tren</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm feature-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Profil Anda</h5>
                        <p class="fw-bold">{{ Auth::user()->name }}</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pertanyaan Tren -->
        <div class="py-5">
            <h2 class="text-center fw-bold mb-4">Pertanyaan Terbaru dari Komunitas</h2>
            @if($questions->isNotEmpty())
                <div class="row g-4">
                    @foreach($questions as $question)
                        <div class="col-md-4">
                            <div class="card feature-card">
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
</x-app-layout>
