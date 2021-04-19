<?php
$form = $_GET['form'];
$subject = $_GET['subject'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Subject Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/validate.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="header">
        <h1>Depository for Exam Questions</h1>
        <p>Application for JPN Kedah.</p>

    </div>
    <div class="topnavbar">
        <a href="mainpage.php">Search</a>
        <a href="#">My Questions</a>
        <a href="#">My Profile</a>
        <a href="../html/login.html" class="right">Logout</a>
    </div>
    <center>
        <?php
        echo "<h2> Selected " . $form . "</h2>";
        echo "<h2> Subject Selected " . $subject . "</h2>";
        ?>
    </center>
    <div class="main">
    </div>

    <div class="bottomnavbar">
        <a href="../index.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>
</body>

</html>