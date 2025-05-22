<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Abhaya Libre' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=BhuTuka Expanded One' rel='stylesheet'>
    <script src="../js/jquery-3.7.1.js"></script>
</head>
<body>
    <?php require_once 'navbar.php';?>
    <div class="container">
        <h1>Logout</h1>
        <div class="row mt-5 justify-content-center">
            <form class="p-3 border bg-white">
                <div>Are you sure you want to logout?</div>
                <button type="button" class="btn" id="yes">Yes</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#yes').click(function(){
                $.post('../api/logoutApi.php', function(data){
                    window.location.href = './mainpage.php'; // Redirect after successful logout
                });
            });
        });
    </script>
</body>
</html>
