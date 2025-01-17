@extends('layouts.app')

@section('fullwidth')
<div class="main-content" style="display: flex; flex-direction: column; justify-content: space-between; min-height: 100vh; background-color: #f8f9fa;"> <!-- Ubah warna background -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="color: #4e54c8;">Kategori</h1>
            <p class="text-dark">
                Jelajahi berbagai kategori pertanyaan yang tersedia.
            </p>
        </div>

        <!-- Daftar Kategori -->
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card category-card shadow-sm text-center border-0 position-relative">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary">Matematika</h5>
                        <p class="small text-muted">Eksplorasi pertanyaan di bidang matematika.</p>
                        <a href="{{ route('categories.show', 'matematika') }}" class="btn btn-outline-primary rounded-pill">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card category-card shadow-sm text-center border-0 position-relative">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary">Sains</h5>
                        <p class="small text-muted">Jelajahi pengetahuan sains terkini.</p>
                        <a href="{{ route('categories.show', 'sains') }}" class="btn btn-outline-primary rounded-pill">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card category-card shadow-sm text-center border-0 position-relative">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary">Bahasa</h5>
                        <p class="small text-muted">Diskusikan topik terkait bahasa.</p>
                        <a href="{{ route('categories.show', 'bahasa') }}" class="btn btn-outline-primary rounded-pill">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card category-card shadow-sm text-center border-0 position-relative">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary">Sejarah</h5>
                        <p class="small text-muted">Temukan pembelajaran sejarah mendalam.</p>
                        <a href="{{ route('categories.show', 'sejarah') }}" class="btn btn-outline-primary rounded-pill">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Inline CSS -->
<style>
    .main-content {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: #f8f9fa; /* Warna latar belakang disesuaikan */
    }

    .category-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .category-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }
</style>
