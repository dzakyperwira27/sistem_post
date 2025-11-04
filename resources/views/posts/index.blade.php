    @extends('layouts.app')

    @section('title', 'Daftar Posts')

    @section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Posts</h2>
        
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Post</a>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
    

    <form action="{{ route('posts.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2"
               placeholder="Cari judul, kategori, atau penulis..."
               value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tag</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $index => $post)
            <tr>
                <td>{{ $posts->firstItem() + $index }}</td>
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
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada post.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Bootstrap 5 -->
    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
    @endsection
