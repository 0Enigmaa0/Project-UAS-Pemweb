@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Detail Pertanyaan</h1>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $question->title }}</h2>
            <p class="text-muted">Kategori: {{ $question->category }} • Diposting oleh {{ $question->user->name }} pada {{ $question->created_at->format('d M Y') }}</p>
            <p class="mt-3">{{ $question->content }}</p>
        </div>
    </div>

    <div class="mt-4">
        <h4>Jawaban</h4>
        @forelse ($question->answers as $answer)
            <div class="card my-3">
                <div class="card-body">
                    <p>{{ $answer->content }}</p>
                    <p class="text-muted">Dijawab oleh {{ $answer->user->name }} pada {{ $answer->created_at->format('d M Y') }}</p>
                </div>
            </div>
        @empty
            <p>Belum ada jawaban untuk pertanyaan ini.</p>
        @endforelse
    </div>

    <div class="mt-4">
        <h4>Tambahkan Jawaban</h4>
        <form action="{{ route('answers.store', $question->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Jawaban Anda</label>
                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Tulis jawaban Anda..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
        </form>
    </div>
</div>
@endsection
