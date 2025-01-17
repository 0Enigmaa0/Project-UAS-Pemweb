@extends('layouts.admin')

@section('fullwidth')
<div class="container py-4">
    <h1 class="mb-4">Kelola Pertanyaan</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penanya</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $question->title }}</td>
                <td>{{ $question->category }}</td>
                <td>{{ $question->user->name }}</td>
                <td>
                    <a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
