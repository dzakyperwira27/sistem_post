@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Kategori</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
