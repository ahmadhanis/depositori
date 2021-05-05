<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {
    $username = $_SESSION["email"];
    $name = $_SESSION["name"];
    
} else {
    echo "<script> alert('Session not available. Please login')</script>";
    echo "<script> window.location.replace('../html/login.html')</script>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/depositori.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="header">
        <h1>Depository for Exam Questions</h1>
        <p>Application for JPN Kedah.</p>

    </div>
    <div class="topnavbar" id="myTopnav">
        <a href="depository.php">Depository</a>
        <a href="mydepository.php">My Depository</a>
        <a href="#">My Profile</a>
        <a href="#">Contact Us</a>
        <a href="../html/login.html" onclick="logout()" class="right">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="mytopnavFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="main">
        <div class="row-single">
            <div class="card-header" type="submit">
                <h3>Depository</h3>
                <p><?php echo $name ?></p>
                <p>Please select form year</p>
            </div>
        </div>
        <div class="row">
            <div class="column-card">
                <a href="subjectspage.php?yearform=Form 1" style="text-decoration:none; color:#000000">
                    <div class="card" type="submit">
                        <h3>Form 1</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>

            <div class="column-card">
                <a href="subjectspage.php?yearform=Form 2" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Form 2</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">

            <div class="column-card">
                <a href="subjectspage.php?yearform=Form 3" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Form 3</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>

                    </div>
                </a>
            </div>

            <div class="column-card">
                <a href="subjectspage.php?yearform=Form 4" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Form 4</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>

                    </div>
                </a>
            </div>
        </div>
        <div class="row">

            <div class="column-card">
                <a href="subjectspage.php?yearform=Form 5" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Form 5</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>
            <div class="column-card">
                <a href="subjectspage.php?yearform=Form 6" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Form 6</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>
        </div>

    </div>

    <div class="bottomnavbar">
        <a href="../index.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>
</body>

</html>