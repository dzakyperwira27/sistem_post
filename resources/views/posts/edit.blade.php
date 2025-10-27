@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Post</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
            </div>

            <div class="mb-3">
                <label>Isi</label>
                <textarea name="content" class="form-control" rows="5">{{ $post->content }}</textarea>
            </div>

            <div class="mb-3">
                <label>Penulis</label>
                <select name="user_id" class="form-select">
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}" {{ $u->id == $post->user_id ? 'selected' : '' }}>
                            {{ $u->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}" {{ $c->id == $post->category_id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tag</label><br>
                @foreach ($tags as $t)
                    <div class="form-check form-check-inline">
                        <input 
                            type="checkbox" 
                            name="tags[]" 
                            value="{{ $t->id }}"
                            class="form-check-input"
                            {{ $post->tags->contains($t->id) ? 'checked' : '' }}
                        >
                        <label class="form-check-label">{{ $t->name }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
