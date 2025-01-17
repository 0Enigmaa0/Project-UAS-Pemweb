<?php

namespace App\Http\Controllers;

use App\Models\Question; // Pastikan Anda memiliki model Question
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method untuk menampilkan halaman utama
    public function home()
    {
        // Ambil pertanyaan terbaru dari database
        $questions = Question::latest()->take(6)->get(); // Ambil maksimal 6 pertanyaan terbaru
        
        // Kirim data ke view 'welcome'
        return view('welcome', compact('questions'));
    }
}
