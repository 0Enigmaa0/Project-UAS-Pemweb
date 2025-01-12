<?php

use App\Http\Controllers\ThreadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;


// Halaman utama
Route::get('/', function () {
    return view('welcome'); // Pastikan file welcome.blade.php ada di resources/views
})->name('home');

// Halaman kategori
Route::get('/categories', function () {
    return view('categories.index'); // Pastikan file resources/views/categories/index.blade.php ada
})->name('categories.index');

// Halaman pertanyaan tren
Route::get('/trending', [QuestionController::class, 'trending'])->name('questions.trending');

// Ajukan pertanyaan (form tanya jawab)
Route::get('/ask', function () {
    return view('questions.ask'); // Pastikan file resources/views/questions/ask.blade.php ada
})->name('questions.ask');

// Rute detail pertanyaan
Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.detail');

// Simpan pertanyaan
Route::middleware(['auth'])->group(function () {
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
});


// Rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    // Halaman dashboard
    Route::get('/dashboard', function () {
        return view('dashboard'); // Pastikan file dashboard.blade.php ada di resources/views
    })->name('dashboard');

    // Halaman profil
    Route::get('/profile', function () {
        return view('profile.show'); // Pastikan file profile/show.blade.php ada
    })->name('profile.show');

    // Resource Threads (CRUD Threads)
    Route::resource('threads', ThreadController::class);

    // Membuat komentar di thread
    Route::post('threads/{thread}/posts', [PostController::class, 'store'])->name('posts.store');
});

// Rute khusus untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

// Autentikasi (Login, Register, dll.)
Auth::routes();

Route::get('/profile/edit', function () {
    return view('profile.edit'); // Pastikan file resources/views/profile/edit.blade.php ada
})->name('profile.edit');

Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard'); 
  