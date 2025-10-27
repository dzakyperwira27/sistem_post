@extends('layouts.app')

@section('title', 'Edit Tag')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Tag</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Tag</label>
                <input type="text" name="name" value="{{ $tag->name }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('tags.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
