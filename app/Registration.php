<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="../js/jquery-3.7.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Abhaya Libre' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=BhuTuka Expanded One' rel='stylesheet'>
</head>
<body>
    <div class="container">
      <?php require_once 'navbar.php';?>
      <h1 class="text-center mt-5">Register</h1>  
      <h5 class="text-center">Already registered?
        <a href="loginform.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Log in.</a>
    </h5>
        <div class="row mt-5 justify-content-center">
          <div class="col-md-8">
          <form class="p-3 border bg-white">
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="DB" class="col-md-4 col-lg-2 col-form-label">Date of Birth</label>
                  <div class="col-md-8 col-lg-10">
                    <input type="date" id="DB" class="form-control id=DB">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="name" class="col-2 col-form-label">Gender</label>
                  <div class="col-10">
                    <input type="radio" name="R1" class="form-check-input" id="M" value="M">
                    <label class="form-check-label" for="M">Male</label>
                    <input type="radio" name="R1" class="form-check-input" id="F" value="F">
                    <label class="form-check-label" for="F">Female</label>
                    <input type="radio" name="R1" class="form-check-input" id="P" value="P">
                    <label class="form-check-label" for="P">Prefer Not To Say</label>
                  </div>
                </div>
                  <div class="row mb-3">
                    <label for="Email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="Email" placeholder="Your Email">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="Password" placeholder="Your Password">
                    </div>
                  </div>
             
                  <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                          Remember me
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="d-grid gap-2">
                  <button type="button" class="btn" id="regbtn">Register</button>
                  </div>
                  </form>
          </div>
        </div>
      </div>
      <div id="result"></div>
    <script>
$(document).ready(function(){
$('#regbtn').click(function(){
var name=$('#name').val();
var DB=$('#DB').val();
var gender=$('input[name="R1"]:checked').val();
var email=$('#Email').val();
var password=$('#Password').val();
$.post('../api/registrationApi.php',{name:name,DB:DB,gender:gender,email:email,password:password},function(data){
                     window.location.href = "../app/loginform.php";
})
});
});
</script>
  </body>
</body>
</html>