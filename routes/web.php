<?php
use App\Models\Question;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminQuestionController;
use App\Http\Controllers\Admin\AdminCategoryController;
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

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::post('/questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::post('/questions/{id}/answers', [AnswerController::class, 'store'])->name('answers.store');

Route::get('/categories', function () {
    return view('categories.index'); // Pastikan file ini ada di resources/views/categories/index.blade.php
})->name('categories.index');


Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');


Route::get('/', function () {
    $questions = Question::latest()->take(3)->get(); // Ambil 3 pertanyaan terbaru dari tabel questions
    return view('welcome', compact('questions'));   // Oper data ke view welcome
})->name('home');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


// Rute untuk home
Route::get('/', [HomeController::class, 'home'])->name('home');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/admin/users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('/admin/questions', \App\Http\Controllers\Admin\QuestionController::class);
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Halaman dashboard admin
    })->name('admin.dashboard');

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);
});





Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});


Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Rute Kelola Kategori
    Route::resource('categories', AdminCategoryController::class)->names([
        'index' => 'admin.categories.index',
        'edit' => 'admin.categories.edit',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',

    ]);

    // Rute Kelola Pengguna
    Route::resource('users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
    Route::resource('questions', AdminQuestionController::class)->names([
        'index' => 'admin.questions.index',
        'create' => 'admin.questions.create',
        'store' => 'admin.questions.store',
        'edit' => 'admin.questions.edit',
        'update' => 'admin.questions.update',
        'destroy' => 'admin.questions.destroy',
    ]);
});



// Route untuk Kelola Pertanyaan Admin