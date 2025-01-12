<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Http\Request;
use App\Notifications\NewCommentNotification;

class PostController extends Controller
{
    public function store(Request $request, Thread $thread)
    {
        // Validasi input komentar
        $request->validate([
            'body' => 'required|string',
        ]);

        // Buat komentar baru
        $post = Post::create([
            'body' => $request->body,
            'thread_id' => $thread->id,
            'user_id' => auth()->id(),
        ]);

        // Kirim notifikasi ke pembuat thread
        $thread->user->notify(new NewCommentNotification($thread));

        // Tambah poin ke pengguna yang berkomentar
        $user = auth()->user();
        $user->increment('points', 10);

        // Redirect kembali ke halaman thread dengan pesan sukses
        return redirect()->route('threads.show', $thread)->with('success', 'Comment added successfully.');
    }
}
