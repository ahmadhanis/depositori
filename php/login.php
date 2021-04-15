<?php
include_once("dbconnect.php");
$email = trim($_POST['email']);
$password = trim(sha1($_POST['password']));

$sqllogin = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' AND otp = '1'";

$stmt = $conn->prepare($sqllogin);
$stmt->bindParam('email', $email, PDO::PARAM_STR);
$stmt->bindValue('password', $password, PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();
$row   = $stmt->fetch(PDO::FETCH_ASSOC);
if($count == 1 && !empty($row)) {
    echo "<script> alert('Login successful')</script>";
    
}else{
    echo "<script> alert('Login fail')</script>";
    echo "<script> window.location.replace('../html/login.html')</script>";
}

?>