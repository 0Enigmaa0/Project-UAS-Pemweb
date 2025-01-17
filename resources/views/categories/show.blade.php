@extends('layouts.app')

@section('fullwidth')
<div class="container py-5">
    <!-- Header Kategori -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Kategori: {{ ucfirst($category) }}</h1>
        <p class="text-muted">Jelajahi berbagai pertanyaan menarik di kategori <strong>{{ ucfirst($category) }}</strong>.</p>
    </div>

    <!-- Daftar Pertanyaan -->
    <div class="row g-4">
        @forelse ($questions as $question)
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">{{ $question->title }}</h5>
                        <p class="card-text text-muted">
                            <span>Diposting oleh <strong>{{ $question->user->name }}</strong></span> • 
                            <span>{{ $question->created_at->format('d M Y, H:i') }}</span>
                        </p>
                        <p class="card-text">{{ Str::limit($question->content, 100, '...') }}</p>
                        <a href="{{ route('questions.detail', $question->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    <i class="bi bi-exclamation-circle"></i> Belum ada pertanyaan di kategori ini.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $questions->links() }}
    </div>
</div>
@endsection

<!-- Inline CSS -->
<style>
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-outline-primary {
        transition: all 0.3s;
    }

    .btn-outline-primary:hover {
        color: white;
        background-color: #4e54c8;
    }
</style>
