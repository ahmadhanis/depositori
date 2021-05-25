<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {
    $user_email = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];
    $subject = $_GET['subject'];
    $pageno = (int)$_GET['pageno'];
    $results_per_page = 20;
    $page_first_result = ($pageno - 1) * $results_per_page;
    $topic = $_GET['topic'];
    if (isset($_GET['button'])) {
        if ($_GET['button'] === 'search') {
            $searchkey = addslashes($_GET['search']);
            if ($topic == 'all') {
                $sqllistquestions = "SELECT * FROM tbl_questions_mcq WHERE user_email = '$user_email' AND form = '$yearform' AND subject_name = '$subject' AND question LIKE '%$searchkey%' ORDER BY date_created DESC";
            } else {
                $sqllistquestions = "SELECT * FROM tbl_questions_mcq WHERE user_email = '$user_email' AND form = '$yearform' AND subject_name = '$subject' AND question LIKE '%$searchkey%' AND topic = '$topic' ORDER BY date_created DESC";
            }
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
    echo "<script> window.location.replace('../php/login.php')</script>";
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
                <h3>My Depository/Form/List</h3>
                <p><?php echo $name ?></p>
                <?php
                echo "<p> Selected " . $yearform . "</p>";
                echo "<p>Subject Selected " . $subject . "</p>";
                ?>
            </div>
        </div>
        <form action="myquestionslist.php" align="center">
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
            if ($pageno == 1){
                $num = 1;
            }else if($pageno == 2){
                $num=($num)+10;
            }else{
                $num = $pageno * 10 - 9;
            }
        echo "<div class='card-question'>";
        foreach ($rows as $question) {
            $qid = $question['q_id'];
            $topicno = $question['topic'];
            echo "<div class='card'>";
           // echo " <div class='card-question'>";
            echo "<p align='right'><a href='myquestionslist.php?button=delete&yearform=$yearform&subject=$subject&qid=$qid&pageno=$pageno&topic=$topicno' 
        class='fa fa-remove' onclick='return deleteDialog()'></a>&nbsp&nbsp<a href='editquestion.php?yearform=$yearform&subject=$subject&qid=$qid&pageno=$pageno&topic=$topicno'  
        class='fa fa-edit''></a></p>";
            echo "<p align='left'>" . ($question['topic']) . "</p>";
            echo "<p align='left'>" . $num++ . "). " . ($question['question']) . "</p>";
            echo "<p align='left'>A.  " . ($question['ans_a']) . "</p>";
            echo "<p align='left'>B.  " . ($question['ans_b']) . "</p>";
            echo "<p align='left'>C.  " . ($question['ans_c']) . "</p>";
            echo "<p align='left'>D.  " . ($question['ans_d']) . "</p>";
            echo "<p align='left'>Ans:  " . ($question['ans']) . "</p>";
            echo "<p align='right'>" . date_format(date_create($question['date_created']), 'd/m/y H:i A') . "</p>";
            //echo "</div>";
            echo "</div>";
        }

        echo "</div>";
        echo "<div class='row-pages'>";
        echo "<center>";
        for ($page = 1; $page <= $number_of_page; $page++) {
            echo '<a href = "myquestionslist.php?pageno=' . $page . '&yearform=' . $yearform . '&subject=' . $subject . '&topic=' . $topic . '">&nbsp&nbsp' . $page . ' </a>';
        }
        echo " ( " . $pageno . " )";
        echo "</center>";
        echo "</div>";
        ?>
        <a href="newquestion.php?yearform=<?php echo $yearform ?>&subject=<?php echo $subject ?>&pageno=<?php echo $pageno ?>" class="float">
            <i class="fa fa-plus my-float"></i>
        </a>
    </div>
    <div class="bottomnavbar">
        <a href="../index.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>
</body>

</html>