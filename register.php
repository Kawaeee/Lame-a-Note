<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
include("connection.php");

$validuser = "SELECT `username`,`email` FROM `user` WHERE 1";
$check = false;
$existuser = mysqli_query($conn,$validuser);
while($obj = mysqli_fetch_object($existuser)){

    if($_POST["reuser"] == $obj->username or  $_POST["reemail"] == $obj->email ){
        echo "<script>alert('This Username or Email already existed. Try Again!!')</script>";
        echo "<script>window.location='./login.php';</script>";
        $check = false;
    }else{
        $check = true;
    }
}

if($check==true){
    echo "<script>alert('Register Successfully!!')</script>";
    echo "<script>window.location='./login.php';</script>";
    $conn->query("INSERT INTO `user` (`id`,`username`, `password`, `name`, `email`,`status`,`created_date`) VALUES ( null,'" . $_POST["reuser"] . "' , '" . $_POST["repass"] . "', '" . $_POST["rename"] . "' , '" . $_POST["reemail"] . "' , 'USER',CURRENT_DATE)");
}
exit();
?>