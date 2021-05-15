<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {
    $username = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];
    $sqlmathmcq = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'Mathematic' ";
    $sqlengmcq = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'English'";
    $sqlscimcq = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'Science'";
    $sqlhismcq = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'History'";
    $sqlbmmcq = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'Bahasa Melayu'";
    $sqlpimcq = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'Pendidikan Islam'";

    $stmt = $conn->prepare($sqlmathmcq);
    $stmt->execute();
    $nummathmcq =  $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlengmcq);
    $stmt->execute();
    $numengmcq = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlscimcq);
    $stmt->execute();
    $numscimcq = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlhismcq);
    $stmt->execute();
    $numhismcq = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlbmmcq);
    $stmt->execute();
    $numbmmcq = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlpimcq);
    $stmt->execute();
    $numpimcq = $number_of_result = $stmt->rowCount();


    $sqlmathmcqstr = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'Mathematic'";
    $sqlengmcqstr = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'English'";
    $sqlscimcqstr = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'Science'";
    $sqlhismcqstr = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'History'";
    $sqlbmmcqstr = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'Bahasa Melayu'";
    $sqlpimcqstr = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'Pendidikan Islam'";

    $stmt = $conn->prepare($sqlmathmcqstr);
    $stmt->execute();
    $nummathstr =  $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlengmcqstr);
    $stmt->execute();
    $numengstr = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlscimcqstr);
    $stmt->execute();
    $numscistr = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlhismcqstr);
    $stmt->execute();
    $numhisstr = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlbmmcqstr);
    $stmt->execute();
    $numbmstr = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlpimcqstr);
    $stmt->execute();
    $numpistr = $number_of_result = $stmt->rowCount();
} else {
    echo "<script> alert('Session not available. Please login')</script>";
    echo "<script> window.location.replace('../php/login.php')</script>";
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
        <a href="profile.php">My Profile</a>
        <a href="#">Contact Us</a>
        <a href="../php/login.php" onclick="logout()" class="right">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="mytopnavFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div class="main">
        <div class="row-single">
            <div class="card-header" type="submit">
                <h3><a href="depository.php"> Depository/Form</a></h3>
                <p><?php echo $name ?></p>
                <?php
                echo "<p> Selected " . $yearform . "</p>";
                ?>
                <p>Please select subject and Question type</p>
            </div>
        </div>
        <div class="row">
            <div class="column-card">
                <div class="card" type="submit">
                    <h3>Mathematic</h3>
                    <a href="questionslist.php?yearform=<?php echo $yearform ?>&subject=Mathematic&pageno=1&topic=all$type=MCQ" style="text-decoration:none; color:#000000">
                        <p>Total MCQ Questions: <?php echo $nummathmcq ?></p>
                    </a>
                    <a href="questionsliststr.php?yearform=<?php echo $yearform ?>&subject=Mathematic&pageno=1&topic=all$type=Structured" style="text-decoration:none; color:#000000">
                        <p>Total Structured Questions: <?php echo $nummathstr ?></p>
                    </a>
                </div>
            </div>

            <div class="column-card">
                <div class="card" type="submit">
                    <h3>English</h3>
                    <a href="questionslist.php?yearform=<?php echo $yearform ?>&subject=English&pageno=1&topic=all$type=MCQ" style="text-decoration:none; color:#000000">
                        <p>Total MCQ Questions:<?php echo $numengmcq ?></p>
                    </a>
                    <a href="questionsliststr.php?yearform=<?php echo $yearform ?>&subject=English&pageno=1&topic=all$type=Structured" style="text-decoration:none; color:#000000">
                        <p>Total Structured Questions: <?php echo $numengstr ?></p>
                    </a>
                </div>
            </div>


            <div class="column-card">
                <div class="card" type="submit">
                    <h3>Science</h3>
                    <a href="questionslist.php?yearform=<?php echo $yearform ?>&subject=Science&pageno=1&topic=all$type=MCQ" style="text-decoration:none; color:#000000">
                        <p>Total MCQ Questions:<?php echo $numscimcq ?></p>
                    </a>
                    <a href="questionsliststr.php?yearform=<?php echo $yearform ?>&subject=Science&pageno=1&topic=all$type=Structured" style="text-decoration:none; color:#000000">
                        <p>Total Structured Questions: <?php echo $numscistr ?></p>
                    </a>
                </div>
            </div>

            <div class="column-card">
                <div class="card" type="submit">
                    <h3>History</h3>
                    <a href="questionslist.php?yearform=<?php echo $yearform ?>&subject=History&pageno=1&topic=all$type=MCQ" style="text-decoration:none; color:#000000">
                        <p>Total MCQ Questions:<?php echo $numhismcq ?></p>
                    </a>
                    <a href="questionsliststr.php?yearform=<?php echo $yearform ?>&subject=History&pageno=1&topic=all$type=Structured" style="text-decoration:none; color:#000000">
                        <p>Total Structured Questions:<?php echo $numhisstr ?></p>
                    </a>
                </div>
            </div>
            <div class="column-card">
                <div class="card" type="submit">
                    <h3>Bahasa Melayu</h3>
                    <a href="questionslist.php?yearform=<?php echo $yearform ?>&subject=Bahasa Melayu&pageno=1&topic=all$type=MCQ" style="text-decoration:none; color:#000000">
                        <p>Total MCQ Questions:<?php echo $numbmmcq ?></p>
                    </a>
                    <a href="questionsliststr.php?yearform=<?php echo $yearform ?>&subject=Bahasa Melayu&pageno=1&topic=all$type=Structured" style="text-decoration:none; color:#000000">
                        <p>Total Structured Questions: <?php echo $numbmstr ?></p>
                    </a>
                </div>
            </div>
            <div class="column-card">
                <div class="card" type="submit">
                    <h3>Pendidikan Islam</h3>
                    <a href="questionslist.php?yearform=<?php echo $yearform ?>&subject=Pendidikan Islam&pageno=1&topic=all$type=MCQ" style="text-decoration:none; color:#000000">
                        <p>Total MCQ Questions:<?php echo $numpimcq ?></p>
                    </a>
                    <a href="questionsliststr.php?yearform=<?php echo $yearform ?>&subject=Pendidikan Islam&pageno=1&topic=all$type=Structured" style="text-decoration:none; color:#000000">
                        <p>Total Structured Questions:<?php echo $numpistr ?></p>
                    </a>
                </div>
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