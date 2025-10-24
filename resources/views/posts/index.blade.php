<!DOCTYPE html>
<html>
<head>
    <title>Sistem Post</title>
</head>
<body>
    <h1>Daftar Posts</h1>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
</body>
</html>
