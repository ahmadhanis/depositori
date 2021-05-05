<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {
    $user_email = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];
    $subject = $_GET['subject'];
    $pageno = (int)$_GET['pageno'];
    $results_per_page = 10;
    $page_first_result = ($pageno - 1) * $results_per_page;

    if (isset($_GET['button'])) {
        if ($_GET['button'] === 'search') {
            $searchkey = addslashes($_GET['search']);
            $sqllistquestions = "SELECT * FROM tbl_questions_mcq WHERE user_email = '$user_email' AND form = '$yearform' AND subject_name = '$subject' AND question LIKE '%$searchkey%' ORDER BY date_created DESC";
        }
        if ($_GET['button'] === 'delete') {
            $qid = $_GET['qid'];
            $sqldelete = "DELETE FROM tbl_questions_mcq WHERE q_id='$qid' AND user_email = '$user_email'";
            $stmt = $conn->prepare($sqldelete);
            if ($stmt->execute()) {
                echo "<script> alert('Delete Success')</script>";
            } else {
                echo "<script> alert('Delete Failed')</script>";
            }
            $sqllistquestions = "SELECT * FROM tbl_questions_mcq WHERE user_email = '$user_email' AND form = '$yearform' AND subject_name = '$subject' ORDER BY date_created DESC";
        }
    } else {
        $sqllistquestions = "SELECT * FROM tbl_questions_mcq WHERE user_email = '$user_email' AND form = '$yearform' AND subject_name = '$subject' ORDER BY date_created DESC";
    }
    $stmt = $conn->prepare($sqllistquestions);
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    $number_of_result = $stmt->rowCount();
    $number_of_page = ceil($number_of_result / $results_per_page);

    $sqllistquestionswithlimit = $sqllistquestions . " LIMIT $page_first_result , $results_per_page";
    $stmt = $conn->prepare($sqllistquestionswithlimit);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
} else {
    echo "<script> alert('Session not available. Please login')</script>";
    echo "<script> window.location.replace('../html/login.html')</script>";
}

function limitStr($str)
{
    if (strlen($str) > 50) {
        return $str = substr($str, 0, 50) . '...';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
                echo "<p>Subject Selected " . $subject . "</p>";
                ?>
            </div>
        </div>
        <form action="myquestionslist.php" align="center">
            <input type="search" id="idsearch" name="search" placeholder="Search from your questions" />
            <input id="idform" name="yearform" type="hidden" value="<?php echo "$yearform" ?>">
            <input id="idsubject" name="subject" type="hidden" value="<?php echo "$subject" ?>">
            <input id="idpageno" name="pageno" type="hidden" value="<?php echo "$pageno" ?>">
            <button type="submit" name="button" value="search">search</button>
        </form>
    </div>
    <?php
    $num = 1;
    echo "<div class='row-question'>";
    foreach ($rows as $question) {
        $qid = $question['q_id'];
        echo "<div class='column-question'>";
        echo " <div class='card-question'>";
        echo "<p align='right'><a href='myquestionslist.php?button=delete&yearform=$yearform&subject=$subject&qid=$qid&pageno=$pageno' 
        class='fa fa-remove' onclick='return deleteDialog()'></a>&nbsp&nbsp<a href='editquestion.php?yearform=$yearform&subject=$subject&qid=$qid&pageno=$pageno' 
        class='fa fa-edit''></a></p>";
        echo "<p align='left'>" . $num++ . ". " . ($question['question']) . "</p>";
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
    echo "<div class='row-pages'>";
    echo"<center>";
    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<a href = "myquestionslist.php?pageno=' . $page . '&yearform=' . $yearform . '&subject=' . $subject . '">&nbsp&nbsp' . $page . ' </a>';
    }
    echo " ( ".$pageno." )";
    echo"</center>";
    echo "</div>";
    ?>
    <a href="newquestion.php?yearform=<?php echo $yearform ?>&subject=<?php echo $subject ?>&pageno=<?php echo $pageno ?>" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>
    </div>
    <div class="listquestion">

    </div>

    </div>
    <div class="bottomnavbar">
        <a href="../index.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>
</body>

</html>