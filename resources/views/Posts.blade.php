<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    
<div class="main-container">
    <div class="profile-button-container">
        <button class="profile-button">Profile</button>

    </div>
    <div class="view-button-container">
    <button class="view-button" onclick="viewLatestPosts()">View</button>
    </div>
    
    <div class="profile-data-container">
        <h3>Profile Details</h3>
        <p id="profileName"></p>
        <p id="profileEmail"></p>
        <p id="profileContact"></p>
        <p id="profileAddress"></p>
      <button class="back-button">Back</button>
    </div>

    <div class="form-container">
    <h2>Post Details</h2>
    <form id="postForm">
        <div class="input-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="input-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <input type="hidden" id="person_id" name="person_id">
        <button type="button" id="postButton" class="post-button">Post</button> 
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    
    $('.profile-button').click(function() {
        $.ajax({
            type: 'GET',
            url: '/latest-person', 
            success: function(response) {
                if (response.success) {
                    const person = response.data;
                    $('#profileName').text(`Full Name: ${person.fullname}`);
                    $('#profileEmail').text(`Email: ${person.email}`);
                    $('#person_id').val(person.id); 
                    if (person.profile) {
                        $('#profileContact').text(`Contact: ${person.profile.contact}`);
                        $('#profileAddress').text(`Address: ${person.profile.address}`);
                       
                    }
                   
                    $('.profile-data-container').show(); 
                    
                } else {
                    $('.profile-data-container').hide();
                    alert('No person found');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); 
                alert('Error fetching profile');
            }
        });
    });

   
    $('.back-button').click(function() {
        $('.profile-data-container').hide(); 
        $('.main-container').show(); 
        
        
    });
   

    $('#postButton').click(function(e){
        e.preventDefault();

        $.ajax({
            type: "post",
            url: "/Post", 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                title: $('#title').val(), 
                description: $('#description').val(), 
                // _token: "{{ csrf_token() }}" 0
            },
            success: function(response) {
                console.log(response);
               // alert(response.message);
                alert("Post added successfully!");
               // window.location.href = "/list";
            $('#title').val('');
            $('#description').val('');
            
            
            },
            // error: function(error) {
            //     console.log(error);
            //     alert("Error adding the post.");
            error: function(xhr, status, error) {
            console.log(xhr.responseText);
            alert("Error adding the post.");

            }
        });
    });
});

function viewLatestPosts() {
    window.location.href = '/posts/latest';
}
</script>



</body>
</html>
