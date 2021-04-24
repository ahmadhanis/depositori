<?php
session_start();
include_once("dbconnect.php");

if ($_SESSION["session_id"]) {
    $user_email = $_SESSION["email"];
    $name = $_SESSION["name"];
    $yearform = $_GET['yearform'];
    $subject = $_GET['subject'];

    $sqllistquestions = "SELECT * FROM tbl_questions WHERE user_email = '$user_email' AND form = '$yearform' AND subject_name = '$subject' ORDER BY date_created ASC";
    $stmt = $conn->prepare($sqllistquestions);
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $questions = $stmt->fetchAll();
} else {
    echo "<script> alert('Session not available. Please login')</script>";
    echo "<script> window.location.replace('../html/login.html')</script>";
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
        <form action="myquestionslist.php" align="center">
            <input type="search" placeholder="Search from your questions" />
            <button type="submit" value="Submit">search</button>
        </form>
    </div>
    
    <div class="main" style="overflow-x:auto">
        <?php echo "<table border='1' align='center'>
        <tr>
          <th>No</th>
          <th>Questions</th>
          <th>A</th>
          <th>B</th>
          <th>C</th>
          <th>D</th>
          <th>Answer</th>
          <th>Date</th>
        </tr>";
        $num = 1;
        foreach ($questions as $question) {
            echo "<tr>";
            echo "<td>" . $num++ . "</td>";
            echo "<td>" . $question['question'] . "</td>";
            echo "<td>" . $question['ans_a'] . "</td>";
            echo "<td>" . $question['ans_b'] . "</td>";
            echo "<td>" . $question['ans_c'] . "</td>";
            echo "<td>" . $question['ans_d'] . "</td>";
            echo "<td>" . $question['ans'] . "</td>";
            echo "<td>" . date_format(date_create($question['date_created']), 'd/m/y H:i') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

    </div>
    <div class="bottomnavbar">
        <a href="../index.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>
</body>

</html>