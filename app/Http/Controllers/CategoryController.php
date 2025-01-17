<?php

namespace App\Http\Controllers;

use App\Models\Question;

class CategoryController extends Controller
{
    public function show($category)
    {
        $questions = Question::where('category', $category)->latest()->paginate(6); // Batasi 6 pertanyaan per halaman
        return view('categories.show', compact('questions', 'category'));
    }
    

    
}
