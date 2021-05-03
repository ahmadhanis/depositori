<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {

    $user_email = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];
    $subject = $_GET['subject'];
    if (isset($_GET['button'])) {
        $searchkey=addslashes($_GET['search']);
        $sqllistquestions = "SELECT * FROM tbl_questions WHERE form = '$yearform' AND subject_name = '$subject' AND question LIKE '%$searchkey%' ORDER BY date_created DESC";    
    }else{
        $sqllistquestions = "SELECT * FROM tbl_questions WHERE form = '$yearform' AND subject_name = '$subject' ORDER BY date_created DESC";
    }   
    
    $stmt = $conn->prepare($sqllistquestions);
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
} else {
    echo "<script> alert('Session not available. Please login')</script>";
    echo "<script> window.location.replace('../html/login.html')</script>";
}
function limitStr($str)
{
    if (strlen($str) > 30) {
        return $str = substr($str, 0, 25) . '...';
    } else {
        return $str;
    }
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
                <h3>My Depository/Form/List</h3>
                <p><?php echo $name ?></p>
                <?php
                echo "<p> Selected " . $yearform . "</p>";
                ?>
                <?php
                echo "<p>Subject Selected " . $subject . "</p>";
                ?>
            </div>
        </div>
        <form action="questionslist.php" align="center">
            <input type="search" id="idsearch" name="search" placeholder="Search from your questions" />
            <input id="idform" name="yearform" type="hidden" value="<?php echo "$yearform" ?>">
            <input id="idsubject" name="subject" type="hidden" value="<?php echo "$subject" ?>">
            <button type="submit" name="button" value="search">search</button>
        </form>
    </div>

    <div class="main" style="overflow-x:auto">
        <?php
        $num = 1;
        echo "<div class='row-question'>";
        foreach ($rows as $question) {
            echo "<div class='column-question'>";
            echo " <div class='card-question'>";
            echo "<p align='left'>" . $num++ . ". " . limitStr($question['question']) . "</p>";
            echo "<p align='left'>A.  " . ($question['ans_a']) . "</p>";
            echo "<p align='left'>B.  " . ($question['ans_b']) . "</p>";
            echo "<p align='left'>C.  " . ($question['ans_c']) . "</p>";
            echo "<p align='left'>D.  " . ($question['ans_d']) . "</p>";
            echo "<p align='left'>Ans:  " . ($question['ans']) . "</p>";
            echo "<p align='right'>" . date_format(date_create($question['date_created']), 'd/m/y H:i A') . "</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
        ?>

    </div>
    <div class="bottomnavbar">
        <a href="../index.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>
</body>

</html>