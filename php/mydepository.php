<?php
session_start();
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
</head>

<body>
    <div class="header">
        <h1>Depository for Exam Questions</h1>
        <p>Application for JPN Kedah.</p>

    </div>
    <div class="topnavbar">
        <a href="depository.php">Depository</a>
        <a href="mydepository.php">My Depository</a>
        <a href="#">My Profile</a>
        <a href="../html/login.html" class="right">Logout</a>
    </div>
    <center>
        <h3>Welcome <?php echo $name ?></h>
            <h3>Please select your Form</h3>
    </center>
    <div class="main">

        <div class="row">

            <div class="column-card">
                <a href="mysubjectslist.php?yearform=Form 1" style="text-decoration:none; color:#000000">
                    <div class="card" type="submit">
                        <h3>Form 1</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>

            <div class="column-card">
                <a href="mysubjectslist.php?yearform=Form 2" style="text-decoration:none; color:#000000">
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
                <a href="mysubjectslist.php?yearform=Form 3" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Form 3</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>

                    </div>
                </a>
            </div>

            <div class="column-card">
                <a href="mysubjectslist.php?yearform=Form 4" style="text-decoration:none; color:#000000">
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
                <a href="mysubjectslist.php?yearform=Form 5" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Form 5</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>
            <div class="column-card">
                <a href="mysubjectslist.php?yearform=Form 6" style="text-decoration:none; color:#000000">
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