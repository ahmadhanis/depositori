<?php
session_start();
if ($_SESSION["session_id"]) {
    $username = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];
    $subject = $_GET['subject'];
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

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
        <h3>Welcome <?php echo $name ?></h3>
        <?php
        echo "<h3> Selected " . $yearform . "</h3>";
        ?>
        <?php
        echo "<h3>Subject Selected " . $subject . "</h3>";
        ?>
    </center>
    <a href="newquestion.php?yearform=<?php echo $yearform ?>&subject=<?php echo $subject?>" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>
    <div class="main">
    </div>
    <div class="bottomnavbar">
        <a href="../index.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>
</body>

</html>