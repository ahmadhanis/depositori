<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {
    $username = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];
    $subject = $_GET['subject'];
    
    if (isset($_GET['question'])) {
        $question = $_GET['question'];
        $ans_a = $_GET['answera'];
        $ans_b = $_GET['answerb'];
        $ans_c = $_GET['answerc'];
        $ans_d = $_GET['answerd'];
        $ans = $_GET['answer'];

        $subject = $_GET['subject'];

        $sqlinsert = "INSERT INTO tbl_questions(form,subject_name,user_email,question,ans_a,ans_b,ans_c,ans_d,ans) VALUES('$yearform','$subject','$user_email','$question','$ans_a','$ans_b','$ans_c','$ans_d','$ans')";
        try {
            $conn->exec($sqlinsert);
            echo "<script> alert('Success')</script>";
        } catch (PDOException $e) {
            echo "<script> alert('Failed')</script>";
        }
    }
} else {
    echo "<script> alert('Session not available. Please login')</script>";
    echo "<script> window.location.replace('../html/login.html')</script>";
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Subject Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/depositori.js"></script>
    <link rel="stylesheet" href="../css/style.css">
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
        <?php
        echo "<h3> Selected " . $yearform . "</h3>";
        echo "<h3> Subject Selected " . $subject . "</h3>";
        ?>
    </center>
    <div class="main">
        <div class="container">
            <form name="questionsForm" action="subjectpage.php" method="get">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Question</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idquestion" name="question" placeholder="Enter your question here..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lnamea">A.</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idanswera" name="answera" placeholder="Answer a">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lnameb">B.</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idanswerb" name="answerb" placeholder="Answer b">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lnamec">C.</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idanswerc" name="answerc" placeholder="Answer b">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lnamed">D.</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idanswerd" name="answerd" placeholder="Answer d">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="answer">Answer</label>
                    </div>
                    <div class="col-75">
                        <select name="answer" id="idanswer">
                            <option value="noselection">Please select your answer</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
                <input id="idform" name="yearform" type="hidden" value="<?php echo "$yearform" ?>">
                <input id="idsubject" name="subject" type="hidden" value=<?php echo "$subject" ?>>
                <div class="row">
                    <div><input type="submit" value="Submit"></div>
                </div>

            </form>
        </div>

        <div class="bottomnavbar">
            <a href="../index.html">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
        </div>
</body>

</html>