<?php
$form = $_GET['form'];
session_start();
$username = $_SESSION["email"];
$password = $_SESSION["password"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Subjects Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/validate.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="header">
        <h1>Depository for Exam Questions</h1>
        <p>Application for JPN Kedah.</p>

    </div>
    <div class="topnavbar">
        <a href="mainpage.php">Search</a>
        <a href="#">My Questions</a>
        <a href="#">My Profile</a>
        <a href="../html/login.html" class="right">Logout</a>
    </div>
    <center>
        <h2>Welcome <?php echo $username ?></h2>
        <?php
        echo "<h2> Selected " . $form . "</h2>";
        ?>
        <h2>Please select subject</h2>
    </center>
    <div class="main">
        <div class="row">

            <div class="column-card">
                <a href="subjectpage.php?form=<?php echo $form ?>&subject=Mathematic" style="text-decoration:none; color:#000000">
                    <div class="card" type="submit">
                        <h3>Mathematic</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>

            <div class="column-card">
                <a href="subjectpage.php?form=<?php echo $form ?>&subject=English" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>English</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">

            <div class="column-card">
                <a href="subjectpage.php?form=<?php echo $form ?>&subject=Science" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Science</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>

                    </div>
                </a>
            </div>

            <div class="column-card">
                <a href="subjectpage.php?form=<?php echo $form ?>&subject=History" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>History</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>

                    </div>
                </a>
            </div>
        </div>
        <div class="row">

            <div class="column-card">
                <a href="subjectpage.php?form=<?php echo $form ?>&subject=Bahasa Melayu" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Bahasa Melayu</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
            </div>
            <div class="column-card">
                <a href="subjectpage.php?form=<?php echo $form ?>&subject=Pendidikan Islam" style="text-decoration:none; color:#000000">
                    <div class="card">
                        <h3>Pendidikan Islam</h3>
                        <p>10 Subjects</p>
                        <p>10 new questions today</p>
                    </div>
                </a>
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