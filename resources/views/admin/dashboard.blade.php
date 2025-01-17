@extends('layouts.admin')

@section('fullwidth')
<div class="container py-5">
    <h1 class="text-center fw-bold">Dashboard Admin</h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5>Total Pertanyaan</h5>
                    <p class="display-5 fw-bold">{{ $totalQuestions }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5>Total Pengguna</h5>
                    <p class="display-5 fw-bold">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5>Total Kategori</h5>
                    <p class="display-5 fw-bold">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
