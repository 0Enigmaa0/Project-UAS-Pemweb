<?php

namespace App\Http\Controllers;

use App\Models\Question;

class DashboardController extends Controller
{
    public function index()
    {
        $questions = Question::latest()->limit(6)->get(); // Ambil 6 pertanyaan terbaru
        return view('dashboard', compact('questions'));
    }
}
