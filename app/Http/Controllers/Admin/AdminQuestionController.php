<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminQuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('category')->paginate(10); // Ambil data pertanyaan dengan paginasi
        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('admin.questions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Question::create($request->all());
        return redirect()->route('admin.questions.index')->with('success', 'Pertanyaan berhasil dibuat!');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $categories = Category::all();
        return view('admin.questions.edit', compact('question', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $question = Question::findOrFail($id);
        $question->update($request->all());
        return redirect()->route('admin.questions.index')->with('success', 'Pertanyaan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.questions.index')->with('success', 'Pertanyaan berhasil dihapus!');
    }
}
