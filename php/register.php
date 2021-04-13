<?php
    include_once("dbconnect.php");
     $name = $_GET["name"];
     $email = $_GET["email"];
     $phone = $_GET["phone"];
     $school = $_GET["school"];
     $passa = $_GET["passworda"];
     $passb = $_GET["passwordb"];
     $shapass = sha1($passa);  

    $sqlregister = "INSERT INTO tbl_user(email,phone,name,school,password) VALUES('$email','$phone','$name','$school','$shapass')";
    try{
        $conn->exec($sqlregister);
        echo "<script> alert('Registration successful')</script>";
        echo "<script> window.location.replace('../html/login.html')</script>";
    }catch(PDOException $e){
        echo "<script> alert('Registration failed')</script>";
        echo "<script> window.location.replace('../html/register.html')</script>";
    }
    


?>