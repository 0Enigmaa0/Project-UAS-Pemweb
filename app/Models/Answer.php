<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi (fillable).
     *
     * @var array
     */
    protected $fillable = [
        'content', 
        'question_id', 
        'user_id',
    ];

    /**
     * Relasi ke model Question.
     * Satu jawaban milik satu pertanyaan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Relasi ke model User.
     * Satu jawaban dimiliki oleh satu pengguna.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessor untuk memformat tanggal pembuatan jawaban.
     *
     * @return string
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d M Y, H:i');
    }

    /**
     * Accessor untuk menampilkan potongan teks jawaban (jika panjang).
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        return strlen($this->content) > 100 
            ? substr($this->content, 0, 100) . '...' 
            : $this->content;
    }
}
