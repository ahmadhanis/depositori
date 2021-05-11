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
    $topic = $_GET['topic'];

    if (isset($_GET['button'])) {
        $searchkey = addslashes($_GET['search']);
        if ($topic == 'all') {
            $sqllistquestions = "SELECT * FROM tbl_questions_mcq INNER JOIN tbl_user ON tbl_questions_mcq.user_email = tbl_user.email WHERE tbl_questions_mcq.form = '$yearform' AND tbl_questions_mcq.subject_name = '$subject' AND tbl_questions_mcq.question LIKE '%$searchkey%' ORDER BY tbl_questions_mcq.date_created DESC";
        } else {
            $sqllistquestions = "SELECT * FROM tbl_questions_mcq INNER JOIN tbl_user ON tbl_questions_mcq.user_email = tbl_user.email WHERE tbl_questions_mcq.form = '$yearform' AND tbl_questions_mcq.subject_name = '$subject' AND tbl_questions_mcq.question LIKE '%$searchkey%' AND tbl_questions_mcq.topic = '$topic' ORDER BY tbl_questions_mcq.date_created DESC";
        }
    } else {
        $sqllistquestions = "SELECT * FROM tbl_questions_mcq INNER JOIN tbl_user ON tbl_questions_mcq.user_email = tbl_user.email WHERE tbl_questions_mcq.form = '$yearform' AND tbl_questions_mcq.subject_name = '$subject' ORDER BY tbl_questions_mcq.date_created DESC";
    }
    $stmt = $conn->prepare($sqllistquestions);
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    $number_of_result = $stmt->rowCount();
    $number_of_page = ceil($number_of_result / $results_per_page);
    //concat  standard query with limiter 
    $sqllistquestionswithlimit = $sqllistquestions . " LIMIT $page_first_result , $results_per_page";
    $stmt = $conn->prepare($sqllistquestionswithlimit);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
} else {
    echo "<script> alert('Session not available. Please login')</script>";
    echo "<script> window.location.replace('../php/login.php')</script>";
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
                <h3>My Depository/Form/List</h3>
                <p><?php echo $name ?></p>
                <?php
                echo "<p> Selected " . $yearform . "</p>";
                ?>
                <?php
                echo "<p>Subject Selected " . $subject . " - MCQ</p>";
                ?>
            </div>
        </div>
        <form action="questionslist.php" align="center">
            <div class="selectsearch">
                <input type="search" id="idsearch" name="search" placeholder="Search from your questions" />

                <select name="topic" id="idtopic">
                    <option value="all">All topics</option>
                    <option value="Topic 1">Topic 1</option>
                    <option value="Topic 2">Topic 2</option>
                    <option value="Topic 3">Topic 3</option>
                    <option value="Topic 4">Topic 4</option>
                    <option value="Topic 5">Topic 5</option>
                    <option value="Topic 6">Topic 6</option>
                    <option value="Topic 6">Topic 7</option>
                    <option value="Topic 6">Topic 8</option>
                    <option value="Topic 6">Topic 9</option>
                    <option value="Topic 6">Topic 10</option>
                </select>

                <input id="idform" name="yearform" type="hidden" value="<?php echo "$yearform" ?>">
                <input id="idsubject" name="subject" type="hidden" value="<?php echo "$subject" ?>">
                <input id="idpageno" name="pageno" type="hidden" value="<?php echo "$pageno" ?>">
                <button type="submit" name="button" value="search">search</button>
            </div>
        </form>


        <?php
        $num = 1;
        echo "<div class='row-question'>";
        foreach ($rows as $question) {
            echo "<div class='column-question'>";
            echo " <div class='card-question'>";
            echo "<p align='left'>" . ($question['topic']) . "</p>";
            echo "<p align='left'>" . $num++ . ". " . ($question['question']) . "</p>";
            echo "<p align='left'>A.  " . ($question['ans_a']) . "</p>";
            echo "<p align='left'>B.  " . ($question['ans_b']) . "</p>";
            echo "<p align='left'>C.  " . ($question['ans_c']) . "</p>";
            echo "<p align='left'>D.  " . ($question['ans_d']) . "</p>";
            echo "<p align='left'>Ans:  " . ($question['ans']) . "</p>";
            echo "<p align='right'>" . date_format(date_create($question['date_created']), 'd/m/y H:i A');
            echo "<br>" . $question['name'];
            echo "<br>" . $question['school'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
        //pagination 
        echo "<div class='row-single'>";
        echo "<center>";
        for ($page = 1; $page <= $number_of_page; $page++) {
            echo '<a href = "questionslist.php?pageno=' . $page . '&yearform=' . $yearform . '&subject=' . $subject . '&topic=' . $topic . '">&nbsp&nbsp' . $page . ' </a>';
        }
        echo " ( " . $pageno . " )";
        echo "</center>";
        echo "</div>";
        //pagination ended 
        ?>
    </div>
    <div class="bottomnavbar">
        <a href="../index.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>
</body>

</html>