@extends('layouts.app')

@section('title', 'Daftar Posts')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Daftar Posts</h2>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Post</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Tag</th>
            <th>Penulis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name ?? '-' }}</td>
            <td>
                @foreach($post->tags as $tag)
                    <span class="badge bg-success">{{ $tag->name }}</span>
                @endforeach
            </td>
            <td>{{ $post->user->name }}</td>
            <td>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
