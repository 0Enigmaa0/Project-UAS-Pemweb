<?php
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold">{{ $thread->title }}</h1>
    <p class="mb-4">{{ $thread->body }}</p>

    <h2 class="text-xl font-semibold mb-2">Komentar</h2>
    @foreach($thread->posts as $post)
    <div class="p-4 bg-gray-100 mb-2 rounded">
        <p>{{ $post->body }}</p>
        <span class="text-sm text-gray-500">Oleh: {{ $post->user->name }}</span>
    </div>
    @endforeach

    @auth
    <form action="{{ route('posts.store', $thread) }}" method="POST" class="mt-4">
        @csrf
        <textarea name="body" class="form-control mb-2" rows="3" placeholder="Tulis komentar..."></textarea>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    @endauth
</div>
@endsection
