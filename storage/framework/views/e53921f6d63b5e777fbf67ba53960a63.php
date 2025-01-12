<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas Belajar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            color: white;
            padding: 60px 0;
        }
        .feature-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .feature-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }
        footer {
            background-color: #212529;
            color: #adb5bd;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
            <img src="/logo.png" alt="Komunitas Belajar" width="30" height="30" class="d-inline-block align-text-top">
            Komunitas Belajar
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(route('categories.index')); ?>">Matematika</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('categories.index')); ?>">Sains</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('categories.index')); ?>">Bahasa</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('categories.index')); ?>">Sejarah</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('questions.trending')); ?>">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#help">Bantuan</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="<?php echo e(route('login')); ?>">Login/Daftar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Dapatkan Jawaban Cepat untuk Semua Pertanyaanmu!</h1>
        <p class="lead mb-4">Bantu dan dibantu oleh komunitas pelajar dari seluruh dunia untuk memecahkan pertanyaan sulit.</p>
        <div>
            <a href="<?php echo e(route('questions.ask')); ?>" class="btn btn-light btn-lg me-3">Ajukan Pertanyaan</a>
            <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-outline-light btn-lg">Jelajahi Kategori</a>
        </div>
    </div>
</div>

<!-- Trending Questions -->
<div class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Pertanyaan yang Sedang Tren</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Apa rumus luas lingkaran?</h5>
                        <p class="card-text text-muted">Matematika • 3 jam yang lalu</p>
                        <a href="<?php echo e(route('questions.detail', ['id' => 1])); ?>" class="stretched-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Mengapa langit berwarna biru?</h5>
                        <p class="card-text text-muted">Sains • 5 jam yang lalu</p>
                        <a href="<?php echo e(route('questions.detail', ['id' => 2])); ?>" class="stretched-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Bagaimana cara membuat essay yang baik?</h5>
                        <p class="card-text text-muted">Bahasa • 1 hari yang lalu</p>
                        <a href="<?php echo e(route('questions.detail', ['id' => 3])); ?>" class="stretched-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="<?php echo e(route('questions.trending')); ?>" class="btn btn-primary">Lihat Semua Pertanyaan</a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="py-4 text-center">
    <div class="container">
        <p>© <?php echo e(date('Y')); ?> Komunitas Belajar. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\komunitas-belajar\resources\views/welcome.blade.php ENDPATH**/ ?>