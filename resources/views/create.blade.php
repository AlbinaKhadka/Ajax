<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ route('store') }}" method="POST">
    @csrf
    
    <label for="title">title:</label>
    <input type="text" name="title" required>
    <label for="description">description:</label>
    <textarea name="description" required></textarea>
    <input type="hidden" name="person_id" value="{{ $person->id }}">
    <button type="submit">Add Post</button>
</form>
</body>
</html>
