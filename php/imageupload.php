<?php
if (isset($_POST['submit'])) {
    if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
        $target_dir = "../images/testimage/";
        $target_file = $target_dir . generateRandomString() . ".png";
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        echo "<script>alert('Success')</script>";
    } else {
        echo "<script>alert('No image selected')</script>";
    }
}

function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/depositori.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <form name="imageuploadform" action="imageupload.php" method="post" enctype="multipart/form-data">
        <div class="row-single">
            <img class="imgselection" src="../images/profile/profile.png"><br>
            <input type="file" onchange="previewFile()" name="fileToUpload[]" id="fileToUpload" multiple><br>
        </div>
        <div class="row">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>

</body>

</html>