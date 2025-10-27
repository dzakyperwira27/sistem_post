@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Kategori</h3>
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center">Belum ada kategori</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
