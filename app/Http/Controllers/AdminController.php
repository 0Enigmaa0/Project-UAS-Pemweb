<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalQuestions' => Question::count(),
            'totalUsers' => User::count(),
            'totalCategories' => Category::count(),
        ]);
    }
}
