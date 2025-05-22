<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Abhaya Libre' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=BhuTuka Expanded One' rel='stylesheet'>
</head>
<body>
    <?php require_once 'navbar.php';?>
    <div class="container">
        <h1 class="text-center mt-5">Log In</h1>
        <h5 class="text-center">Need an account?
            <a href="Registration.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Create One</a>
        </h5>
        <div class="row mt-5 justify-content-center">
            <div class="col-md-8">
                <form class="p-4 border bg-white">
                    <div class="row">
                        <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="row">
                        <input type="email" id="email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="row">
                        <label for="password" class="col-form-label">Password</label>
                    </div>
                    <div class="row">
                        <input type="password" id="password" class="form-control" placeholder="Your Password">
                    </div><br>
                    
                    <div class="d-grid gap-2">
                        <button class="btn" id="loginbtn" type="button">Login</button>
                </form>
                <div id="valid"></div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.7.1.js"></script> 
    <script>
$(document).ready(function() {
$('#loginbtn').click(function(){

var email=$('#email').val();
var password=$('#password').val();
$.ajax({
method: "POST",
url: "../api/loginApi.php",
data: { mail:email, pwd:password },
})
.done(function( msg ) {
var response = JSON.parse(msg);
                    if(response.status == 1)
                     window.location.href = "../app/homepage.php";
                    else
                    $('#valid').html("Invalid username and password");

});

})
})
</script>
</html>

