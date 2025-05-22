<?php
session_start();
if (!isset($_SESSION['userID']))
header("Location: ./loginform.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Abhaya Libre' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=BhuTuka Expanded One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Neuton' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bebas Neue' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/quote.css">
    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/quote.js"></script>
    <script src="../js/search.js"></script>
</head>
    <body>
    <?php require_once 'navbar.php';?>
    <div id="warningMessage"></div>
    <div class="container">
    <h4 class="mt-4">Welcome <?php echo $_SESSION['name']?> !</h4>
        
<form class="d-flex mt-3">
          <input class="form-control me-2" type="search" placeholder="Enter Keyword or Author" name="search" id="searchbox">
          <button class="btn" type="submit" id="searchbtn"><u>S</u>earch</button>
        </form>
         <br>
        <div id="results">
        </div>
  
        <div class="quote mt-5 mb-3">
            <blockquote>
                <p>quote goes here </p>
                <p>author goes here</p>
            </blockquote>
        </div>
        <div class="row">
                <div class="quotebtn col col-sm-6">
                    <button type="button" class="btn left-button " id="left"><u>P</u>revious</button>
                    <button type="button" class="btn right-button " id="right"><u>N</u>ext</button>
                </div>
        </div>
        <div class="row  justify-content-center">
        <h5 class="text-center mt-5">Let's rate your wellbeing for today!</h5>
        <div class="row justify-content-center">
            <div class="col-md-9">
            <form class="p-3 bg-white" action="../api/createscoreApi.php" method="POST"> 
                <div class="border mb-3">        
                <div class="row mb-3">
                    <label for="name" class="Category text-center col-4 col-form-label">Happiness</label>
                        <div class="star-widget col-8">
                            <input type="radio" name="rateH" id="rtH5" value="5">
                            <label for="rtH5" class="fas fa-star"></label>
                            <input type="radio" name="rateH" id="rtH4" value="4">
                            <label for="rtH4" class="fas fa-star"></label>
                            <input type="radio" name="rateH" id="rtH3" value="3">
                            <label for="rtH3" class="fas fa-star"></label>
                            <input type="radio" name="rateH" id="rtH2" value="2">
                            <label for="rtH2" class="fas fa-star"></label>
                            <input type="radio" name="rateH" id="rtH1" value="1">
                            <label for="rtH1" class="fas fa-star"></label>
                        </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="Category text-center col-4 col-form-label">Workload Management</label>
                    <div class="star-widget col-8">
                        <input type="radio" name="rateW" id="rtW5" value="5">
                        <label for="rtW5" class="fas fa-star"></label>
                        <input type="radio" name="rateW" id="rtW4" value="4">
                        <label for="rtW4" class="fas fa-star"></label>
                        <input type="radio" name="rateW" id="rtW3" value="3">
                        <label for="rtW3" class="fas fa-star"></label>
                        <input type="radio" name="rateW" id="rtW2" value="2">
                        <label for="rtW2" class="fas fa-star"></label>
                        <input type="radio" name="rateW" id="rtW1" value="1">
                        <label for="rtW1" class="fas fa-star"></label>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="Category text-center col-xs-2 col-4 col-form-label">Anxiety Management</label>
                    <div class="star-widget col-xs-10 col-8">
                        <input type="radio" name="rateA" id="rtA5" value="5">
                        <label for="rtA5" class="fas fa-star"></label>
                        <input type="radio" name="rateA" id="rtA4" value="4">
                        <label for="rtA4" class="fas fa-star"></label>
                        <input type="radio" name="rateA" id="rtA3" value="3">
                        <label for="rtA3" class="fas fa-star"></label>
                        <input type="radio" name="rateA" id="rtA2" value="2">
                        <label for="rtA2" class="fas fa-star"></label>
                        <input type="radio" name="rateA" id="rtA1" value="1">
                        <label for="rtA1" class="fas fa-star"></label>
                    </div>
                </div>
                </div>

                <div class="col-12 text-center mb-5">
                            <input class="btn" type="submit" id="submitrate" value='Submit'>
                        </div>
</div>
        </form>
    </div>
    <script>
        function Avg_score() {
        $.ajax({
            url: '../api/alertApi.php',
            success: function(response) {
                $('#warningMessage').html(response);
            },
            error: function() {
                $('#warningMessage').html('<div class="alert alert-danger">Error fetching wellbeing advice.</div>');
            }
        });
    }
 
    $(document).ready(function() {
        Avg_score();
    });
        </script>
</body>
</html>

