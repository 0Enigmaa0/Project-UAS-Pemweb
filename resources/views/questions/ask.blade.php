@extends('layouts.app') <!-- Memastikan menggunakan layout utama -->

@section('content')
<div class="hero text-center mb-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Ajukan Pertanyaanmu!</h1>
        <p class="lead mb-4">Komunitas belajar siap membantu menjawab pertanyaanmu!</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Ajukan Pertanyaan</h2>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <!-- Judul Pertanyaan -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Pertanyaan</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul pertanyaan Anda" required>
                        </div>
                        <!-- Kategori -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="Matematika">Matematika</option>
                                <option value="Sains">Sains</option>
                                <option value="Bahasa">Bahasa</option>
                                <option value="Sejarah">Sejarah</option>
                            </select>
                        </div>
                        <!-- Isi Pertanyaan -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Isi Pertanyaan</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Jelaskan pertanyaan Anda..." required></textarea>
                        </div>
                        <!-- Tombol Kirim -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Kirim Pertanyaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
