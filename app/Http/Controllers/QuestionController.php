<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Menyimpan pertanyaan ke database
     */
    public function store(Request $request)
    {
        // Pastikan pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengajukan pertanyaan.');
        }

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'content' => 'required|string',
        ]);

        // Simpan pertanyaan ke database
        Question::create([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'user_id' => auth()->id(), // Mengambil ID pengguna yang login
        ]);

        return redirect()->route('questions.trending')->with('success', 'Pertanyaan Anda berhasil diajukan!');
    }

    /**
     * Menampilkan daftar pertanyaan yang sedang tren
     */
    public function trending()
    {
        // Ambil pertanyaan berdasarkan jumlah views atau waktu terbaru
        $questions = Question::orderBy('views', 'desc')->limit(10)->get();

        return view('questions.trending', compact('questions'));
    }

    /**
     * Menampilkan detail pertanyaan berdasarkan ID
     */
    public function show($id)
    {
        // Cari pertanyaan dengan relasi user dan jawaban
        $question = Question::with(['user', 'answers.user'])->findOrFail($id);

        // Tambahkan jumlah views
        $question->increment('views');

        return view('questions.detail', compact('question'));
    }
}
