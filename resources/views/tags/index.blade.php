@extends('layouts.app')

@section('title', 'Daftar Tag')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Tag</h3>
        <a href="{{ route('tags.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Tag</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center">Belum ada tag</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
