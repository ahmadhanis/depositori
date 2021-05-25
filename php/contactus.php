<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {
    $username = $_SESSION["email"];
    $name = $_SESSION["name"];
    $school = $_SESSION["school"];
    $phone = $_SESSION["phone"];
    $datereg = $_SESSION["datereg"];
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $school = $_POST['school'];
        $question = $_POST['question'];
        try {
            $sqlinsert = "INSERT INTO tbl_contact(name,email,school,phone,comment) VALUES('$name','$email','$school','$phone','$question')";
            $conn->exec($sqlinsert);
            echo "<script>alert('Success. We will contact you soon')</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Failed')</script>";
        }
    }
} else {
    echo "<script> alert('Session not available. Please login')</script>";
    echo "<script> window.location.replace('../php/login.php')</script>";
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
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
        <a href="profile.php">My Profile</a>
        <a href="#">Contact Us</a>
        <a href="../php/login.php" onclick="logout()" class="right">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="mytopnavFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="main">
        <center>

            <div class="container">
                <form name="contactusform" action="contactus.php" method="post">
                    <h2>Contact Us</h2>
                    <div class="row-single">
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="idname" name="name" placeholder="Your name.." value="<?php echo $name; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="idemail" name="email" placeholder="Your email.." value="<?php echo $username; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lphone">Phone</label>
                        </div>
                        <div class="col-75">
                            <input type="tel" id="idphone" name="phone" placeholder="Your phone number.." value="<?php echo $phone; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lschool">School</label>
                        </div>
                        <div class="col-75">
                            <input type="tel" id="idschool" name="school" value="<?php echo $school; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Question</label>
                        </div>
                        <div class="col-75">
                            <textarea type="text" cols="110%" rows="5" id="idquestion" name="question" resize="none" placeholder="Your question/issue here" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" name="submit" value="Submit">
                    </div>
            </div>

            </form>
        </center>
    </div>


    </div>

    <div class="bottomnavbar">
        <a href="../index.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>
</body>

</html>