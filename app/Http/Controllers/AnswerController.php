<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Simpan jawaban ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $questionId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $questionId)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|string|max:5000',
        ]);

        // Cari pertanyaan berdasarkan ID
        $question = Question::findOrFail($questionId);

        // Simpan jawaban
        $answer = new Answer();
        $answer->content = $request->input('content');
        $answer->question_id = $question->id;
        $answer->user_id = auth()->id(); // Pastikan user login
        $answer->save();

        return redirect()->route('questions.detail', ['id' => $questionId])
                         ->with('success', 'Jawaban Anda berhasil dikirim!');
    }
}
