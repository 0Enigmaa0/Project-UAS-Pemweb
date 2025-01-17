<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use App\Models\Answer;
use App\Models\Category; // Import model kategori

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Hitung data yang diperlukan untuk dashboard
        $totalQuestions = Question::count();
        $totalUsers = User::count();
        $totalAnswers = Answer::count();
        $totalCategories = Category::count(); // Hitung total kategori

        // Kirim data ke view
        return view('admin.dashboard', compact('totalQuestions', 'totalUsers', 'totalAnswers', 'totalCategories'));
    }
}
