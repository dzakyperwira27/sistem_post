@extends('layouts.app')

@section('title', 'Tambah Tag')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Tambah Tag</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Tag</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('tags.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
