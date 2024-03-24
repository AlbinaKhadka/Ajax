<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Main Page</title>
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    
<div class="container">
<h2>Personal Details</h2>
  <form id="userForm" class="form-box">
    <label for="fullname">Full Name</label>
    <input type="text" id="fullname" name="fullname" placeholder="Your full name..">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Your email address..">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Your password..">

    <label for="contact">Contact</label>
    <input type="text" id="contact" name="contact" placeholder="Your contact number..">

    <label for="address">Address</label>
    <input type="text" id="address" name="address" placeholder="Your address..">
    <button type="submit">Submit</button>
   

  </form>
  <div id="message"></div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#userForm').submit(function(e) {
        e.preventDefault();
        $.ajax({

            type: 'POST',
            url: '/person',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(response) {
                alert(response.message); 
                console.log(response.data); 
                window.location.href='/Post';
            },
            error: function(error) {
                console.log(error);
                alert('An error occurred');
            }
        });
    });
});
</script>
</div>
</body>
</html>
