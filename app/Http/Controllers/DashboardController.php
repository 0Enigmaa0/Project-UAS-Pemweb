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

    public function dashboard()
{
    // Ambil data dari database
    $questions = \App\Models\Question::latest()->take(6)->get();
    $totalQuestions = \App\Models\Question::count();
    $totalAnswers = \App\Models\Answer::count();
    $totalUsers = \App\Models\User::count();
    $userQuestions = auth()->check() ? auth()->user()->questions->count() : 0;
    $userAnswers = auth()->check() ? auth()->user()->answers->count() : 0;

    return view('dashboard', compact(
        'questions', 'totalQuestions', 'totalAnswers', 'totalUsers', 'userQuestions', 'userAnswers'
    ));
}

    
}
