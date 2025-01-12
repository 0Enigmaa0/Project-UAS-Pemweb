<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi (fillable)
    protected $fillable = ['content', 'question_id', 'user_id'];

    // Relasi ke tabel questions (satu jawaban milik satu pertanyaan)
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // Relasi ke tabel users (satu jawaban dimiliki oleh satu pengguna)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
