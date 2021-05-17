<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {
    $username = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];

    $sqlform1 = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'Mathematic' AND user_email = '$username'";
    $sqlform2 = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'English' AND user_email = '$username'";
    $sqlform3 = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'Science' AND user_email = '$username'";
    $sqlform4 = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'History' AND user_email = '$username'";
    $sqlform5 = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'Bahasa Melayu' AND user_email = '$username'";
    $sqlform6 = "SELECT * FROM tbl_questions_mcq WHERE form = '$yearform' AND subject_name = 'Pendidikan Islam' AND user_email = '$username'";

    $stmt = $conn->prepare($sqlform1);
    $stmt->execute();
    $qform1mcq =  $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlform2);
    $stmt->execute();
    $qform2mcq = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlform3);
    $stmt->execute();
    $qform3mcq = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlform4);
    $stmt->execute();
    $qform4mcq = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlform5);
    $stmt->execute();
    $qform5mcq = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlform6);
    $stmt->execute();
    $qform6mcq = $number_of_result = $stmt->rowCount();


    $sqlform1str = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'Mathematic' AND user_email = '$username'";
    $sqlform2str = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'English' AND user_email = '$username'";
    $sqlform3str = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'Science' AND user_email = '$username'";
    $sqlform4str = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'History' AND user_email = '$username'";
    $sqlform5str = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'Bahasa Melayu' AND user_email = '$username'";
    $sqlform6str = "SELECT * FROM tbl_questions_str WHERE form = '$yearform' AND subject_name = 'Pendidikan Islam' AND user_email = '$username'";

    $stmt = $conn->prepare($sqlform1str);
    $stmt->execute();
    $qform1str =  $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlform2str);
    $stmt->execute();
    $qform2str = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlform3str);
    $stmt->execute();
    $qform3str = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlform4str);
    $stmt->execute();
    $qform4str = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlform5str);
    $stmt->execute();
    $qform5str = $number_of_result = $stmt->rowCount();

    $stmt = $conn->prepare($sqlform6str);
    $stmt->execute();
    $qform6str = $number_of_result = $stmt->rowCount();
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
        <a href="contactus.php">Contact Us</a>
        <a href="../php/login.php" onclick="logout()" class="right">Logout</a>
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
                <div class="card" type="submit">
                    <h3>Mathematic</h3>
                    <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=Mathematic&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>MCQ Questions: <?php echo $qform1mcq ?></p>
                    </a>
                    <a href="myquestionsliststr.php?yearform=<?php echo $yearform ?>&subject=Mathematic&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>Structured Questions: <?php echo $qform1str ?></p>
                    </a>
                </div>
            </div>

            <div class="column-card">
                <div class="card" type="submit">
                    <h3>English</h3>
                    <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=English&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>MCQ Questions: <?php echo $qform2mcq ?></p>
                    </a>
                    <a href="myquestionsliststr.php?yearform=<?php echo $yearform ?>&subject=English&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>Structured Questions: <?php echo $qform2str ?></p>
                    </a>
                </div>
            </div>

            <div class="column-card">
                <div class="card" type="submit">
                    <h3>Science</h3>
                    <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=Science&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>MCQ Questions: <?php echo $qform3mcq ?></p>
                    </a>
                    <a href="myquestionsliststr.php?yearform=<?php echo $yearform ?>&subject=Science&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>Structured Questions: <?php echo $qform3str ?></p>
                    </a>
                </div>
            </div>

            <div class="column-card">
                <div class="card" type="submit">
                    <h3>History</h3>
                    <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=History&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>MCQ Questions: <?php echo $qform4mcq ?></p>
                    </a>
                    <a href="myquestionsliststr.php?yearform=<?php echo $yearform ?>&subject=History&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>Structured Questions: <?php echo $qform4str ?></p>
                    </a>
                </div>
            </div>


            <div class="column-card">
                <div class="card" type="submit">
                    <h3>Bahasa Melayu</h3>
                    <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=Bahasa Melayu&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>MCQ Questions: <?php echo $qform5mcq ?></p>
                    </a>
                    <a href="myquestionsliststr.php?yearform=<?php echo $yearform ?>&subject=Bahasa Melayu&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>Structured Questions: <?php echo $qform5str ?></p>
                    </a>
                </div>
            </div>
            <div class="column-card">
                <div class="card" type="submit">
                    <h3>Pendidikan Islam</h3>
                    <a href="myquestionslist.php?yearform=<?php echo $yearform ?>&subject=Pendidikan Islam&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>MCQ Questions: <?php echo $qform6mcq ?></p>
                    </a>
                    <a href="myquestionsliststr.php?yearform=<?php echo $yearform ?>&subject=Pendidikan Islam&pageno=1&topic=all" style="text-decoration:none; color:#000000">
                        <p>Structured Questions: <?php echo $qform6str ?></p>
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