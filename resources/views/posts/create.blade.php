@extends('layouts.app')

@section('title', 'Tambah Post')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Tambah Post</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label>Isi</label>
                <textarea name="content" class="form-control" rows="5"></textarea>
            </div>

            <div class="mb-3">
                <label>Penulis</label>
                <select name="user_id" class="form-select">
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tag</label><br>
                @foreach ($tags as $t)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="tags[]" value="{{ $t->id }}" class="form-check-input">
                        <label class="form-check-label">{{ $t->name }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
