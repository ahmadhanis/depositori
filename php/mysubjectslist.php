<?php
session_start();
if ($_SESSION["session_id"]) {
    $username = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];
} else {
    echo "<script> alert('Session not available. Please login')</script>";
    echo "<script> window.location.replace('../html/login.html')</script>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Subjects Page</title>
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
                <h3>My Depository/Form</h3>
                <p><?php echo $name ?></p>
                <?php
                echo "<p> Selected " . $yearform . "</p>";
                ?>
                <p>Please select subject</p>
            </div>
        </div>
        <div class="row">

            <div class="column-card">
                <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=Mathematic&pageno=1" style="text-decoration:none; color:#000000">
                    <div class="card" type="submit">
                        <h3>Mathematic</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>

            <div class="column-card">
                <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=English&pageno=1" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>English</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">

            <div class="column-card">
                <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=Science&pageno=1" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Science</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>

                    </div>
                </a>
            </div>

            <div class="column-card">
                <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=History&pageno=1" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>History</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>

                    </div>
                </a>
            </div>
        </div>
        <div class="row">

            <div class="column-card">
                <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=Bahasa Melayu&pageno=1" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Bahasa Melayu</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>
            <div class="column-card">
                <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=Pendidikan Islam&pageno=1" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Pendidikan Islam</h3>
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