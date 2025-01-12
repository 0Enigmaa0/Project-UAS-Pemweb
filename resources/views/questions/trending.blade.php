@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Pertanyaan yang Sedang Tren</h1>

    <div class="row g-4">
        @forelse ($questions as $question)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $question->title }}</h5>
                        <p class="text-muted">Kategori: {{ $question->category }} • {{ $question->created_at->diffForHumans() }}</p>
                        <p class="card-text">{{ Str::limit($question->content, 100) }}</p>
                        <a href="{{ route('questions.detail', $question->id) }}" class="stretched-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Tidak ada pertanyaan yang sedang tren.</p>
        @endforelse
    </div>
</div>
@endsection
