<?php
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Forum Diskusi</h1>
    <a href="{{ route('threads.create') }}" class="btn btn-primary mb-4">Buat Thread Baru</a>
    <div class="space-y-4">
        @foreach($threads as $thread)
        <div class="p-4 bg-white shadow rounded">
            <h2 class="text-xl font-semibold">
                <a href="{{ route('threads.show', $thread) }}">{{ $thread->title }}</a>
            </h2>
            <p>{{ $thread->body }}</p>
            <span class="text-sm text-gray-500">Oleh: {{ $thread->user->name }}</span>
        </div>
        @endforeach
    </div>
    {{ $threads->links() }}
</div>
@endsection
