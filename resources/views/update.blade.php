<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/list.css') }}"> -->
</head>
<body>

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT') 
    
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $post->title }}" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required>{{ $post->description }}</textarea>

    <button type="submit">Update Post</button>
</form>

</body>
</html>
