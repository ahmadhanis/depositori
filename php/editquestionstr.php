<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {
    $user_email = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];
    $subject = $_GET['subject'];
    $qid = $_GET['qid'];
    $pageno = $_GET['pageno'];
    $sqllistquestion = "SELECT * FROM tbl_questions_str WHERE user_email = '$user_email' AND q_id = '$qid'";
    $stmt = $conn->prepare($sqllistquestion);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();

    if (isset($_GET['submit'])) {
        if ($_GET['submit'] === "Update") {
            $question = addslashes($_GET['question']);
            $ans = $_GET['answer'];
            $topic = $_GET['topic'];
            if ($ans === "noselection") {
                echo "<script> alert('Please select answer')</script>";
            } else {
                $sqlupdate = "UPDATE tbl_questions_str SET question='$question',ans='$ans', topic='$topic' WHERE q_id = '$qid'";
                try {
                    $conn->exec($sqlupdate);
                    echo "<script> alert('Update Success')</script>";
                    echo "<script> window.location.replace('../php/myquestionsliststr.php?yearform=$yearform&subject=$subject&pageno=$pageno&topic=$topic')</script>";
                } catch (PDOException $e) {
                    echo "<script> alert('Failed')</script>";
                }
            }
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
    <title>Edit Question</title>
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
                <h3>My Depository/Form/List/Edit Question</h3>
                <?php
                echo "<h3> " . $name . "</h3>";
                echo "<p> Form Selected " . $yearform . "</p>";
                echo "<p> Subject Selected " . $subject . "</p>";
                ?>
            </div>
        </div>
        <form name="editquestionForm" action="editquestionstr.php" onsubmit="return updateDialog()" method="get">
            <div class="row">
                <div class="col-25">
                    <label for="answer">Answer</label>
                </div>
                <div class="col-75">
                    <?php
                    foreach ($rows as $question) {
                        $topic = $question['topic'];
                    }
                    echo "<select name='topic' id='idtopic'>
                            <option value='noselection'>Please select your topic</option>
                            <option value='Topic 1'" . ($topic == 'Topic 1' ? ' selected' : '') . ">Topic 1</option>
                            <option value='Topic 2'" . ($topic == 'Topic 2' ? ' selected' : '') . ">Topic 2</option>
                            <option value='Topic 3'" . ($topic == 'Topic 3' ? ' selected' : '') . ">Topic 3</option>
                            <option value='Topic 4'" . ($topic == 'Topic 4' ? ' selected' : '') . ">Topic 4</option>
                            <option value='Topic 5'" . ($topic == 'Topic 5' ? ' selected' : '') . ">Topic 5</option>
                            <option value='Topic 6'" . ($topic == 'Topic 6' ? ' selected' : '') . ">Topic 6</option>
                            <option value='Topic 7'" . ($topic == 'Topic 7' ? ' selected' : '') . ">Topic 7</option>
                            <option value='Topic 8'" . ($topic == 'Topic 8' ? ' selected' : '') . ">Topic 8</option>
                            <option value='Topic 9'" . ($topic == 'Topic 9' ? ' selected' : '') . ">Topic 9</option>
                            <option value='Topic 10'" . ($topic == 'Topic 10' ? ' selected' : '') . ">Topic 1-</option>
                        </select>"
                    ?>

                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="fname">Question</label>
                </div>
                <div class="col-75">
                    <textarea type="text" cols="110%" rows="5" id="idquestion" name="question" resize="none" placeholder="Your question here" required><?php foreach ($rows as $question) {
                                                                                                                                                            echo $question['question'];
                                                                                                                                                        } ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">Answer</label>
                </div>
                <div class="col-75">
                    <textarea type="text" cols="110%" rows="5" id="idanswer" name="answer" resize="none" placeholder="Your answer here" required><?php foreach ($rows as $question) {
                                                                                                                                                        echo $question['ans'];
                                                                                                                                                    } ?></textarea>
                </div>
            </div>
            <input id="idform" name="yearform" type="hidden" value="<?php echo "$yearform" ?>">
            <input id="idsubject" name="subject" type="hidden" value=<?php echo "$subject" ?>>
            <input id="qid" name="qid" type="hidden" value=<?php echo "$qid" ?>>
            <input id="idpageno" name="pageno" type="hidden" value=<?php echo "$pageno" ?>>
            <div class="row"> <input type="submit" name="submit" value="Update"></div>
        </form>
    </div>

    <div class="bottomnavbar">
        <a href="../index.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>

</body>

</html>