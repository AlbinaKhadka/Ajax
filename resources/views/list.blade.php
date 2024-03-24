<!DOCTYPE html>
<html>
<head>
    <title>Posts of the Latest Person</title>
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
</head>
<body>
@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>
                  
                <button onclick="window.location.href='{{ route('posts.edit', $post->id) }}'">Update</button>

                   
                    <button onclick="deletePost({{ $post->id }})">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    function deletePost(id) {
        if (confirm('Are you sure you want to delete this post?')) {
            fetch(`/posts/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                window.location.reload();
            })
            .catch(error => console.error('Error:', error));
        }
    }
    
    // function updatePost(id) {
    // window.location.href = `/edit/${id}`;}
    
   

       
    
</script>

