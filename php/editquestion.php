<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {
    $user_email = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];
    $subject = $_GET['subject'];
    $qid = $_GET['qid'];
    $sqllistquestion = "SELECT * FROM tbl_questions WHERE user_email = '$user_email' AND q_id = '$qid'";
    $stmt = $conn->prepare($sqllistquestion);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();

    if (isset($_GET['submit'])) {
        $question = addslashes($_GET['question']);
        $ans_a = $_GET['answera'];
        $ans_b = $_GET['answerb'];
        $ans_c = $_GET['answerc'];
        $ans_d = $_GET['answerd'];
        $ans = $_GET['answer'];
        if ($ans === "noselection") {
            echo "<script> alert('Please select answer')</script>";
        } else {
            $sqlinsert = "INSERT INTO tbl_questions(form,subject_name,user_email,question,ans_a,ans_b,ans_c,ans_d,ans) VALUES('$yearform','$subject','$user_email','$question','$ans_a','$ans_b','$ans_c','$ans_d','$ans')";
            try {
                $conn->exec($sqlinsert);
                echo "<script> alert('Success')</script>";
                echo "<script> window.location.replace('../php/myquestionslist.php?yearform=$yearform&subject=$subject&pageno=1')</script>";
            } catch (PDOException $e) {
                echo "<script> alert('Failed')</script>";
            }
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
                <h3>My Depository/Form/List/Edit Question</h3>
                <?php
                echo "<h3> " . $name . "</h3>";
                echo "<p> Form Selected " . $yearform . "</p>";
                echo "<p> Subject Selected " . $subject . "</p>";
                ?>
            </div>

            <form name="questionForm" action="newquestion.php" onsubmit="return validateNewQForm()" method="get">

                <div class="row">
                    <div class="col-25">
                        <label for="fname">Question</label>
                    </div>
                    <div class="col-75">
                        <textarea type="text" cols="110%" rows="5" id="idquestion" name="question" resize="none" placeholder="Your question here" required><?php foreach ($rows as $question){echo $question['question'];} ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lnamea">A.</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idanswera" name="answera" placeholder="Answer a" value= <?php foreach ($rows as $question){echo $question['ans_a'];} ?> required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lnameb">B.</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idanswerb" name="answerb" placeholder="Answer b" value= <?php foreach ($rows as $question){echo $question['ans_b'];} ?> required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lnamec">C.</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idanswerc" name="answerc" placeholder="Answer c" value= <?php foreach ($rows as $question){echo $question['ans_c'];} ?> required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lnamed">D.</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idanswerd" name="answerd" placeholder="Answer d" value= <?php foreach ($rows as $question){echo $question['ans_d'];} ?> required>
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
                <div class="row">
                    <input id="idform" name="yearform" type="hidden" value="<?php echo "$yearform" ?>">
                </div>
                <div class="row">
                    <input id="idsubject" name="subject" type="hidden" value=<?php echo "$subject" ?>>
                </div>
                <div class="row">
                    <div><input type="submit" name="submit" value="Update"></div>
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