<?php
error_reporting(0);
include("connection.php");
session_start();

$upname = $_POST["upname"];
$upemail = $_POST["upemail"];
$uppass = $_POST["uppass"];
$upuser = $_POST["upusername"];
$upstatus = $_POST["upstatus"];

if($upname == null or $upemail == null){
    echo "<script>alert('We need you to access this from home site.Try again!!')</script>";
    echo "<script>window.location='./user_home.php';</script>";
}

$query = "UPDATE `user` SET `name`= ? ,`email`= ? WHERE `password` = ? AND `username` = ?";
$prequery = $conn->prepare($query);
$prequery->bind_param("ssss",$upname,$upemail,$uppass,$upuser);
$prequery->execute();

if(mysqli_affected_rows($conn) >= 1){
    echo "<script>alert('Update Successful !!')</script>";
    if($upstatus=="ADMIN"){
        echo "<script>window.location='./admin_home.php';</script>";
    }else{
        echo "<script>window.location='./user_home.php';</script>";
    }
}
else{
    echo "<script>alert('Your password is incorrect or Nothing changes.Try again!!')</script>";
    if($upstatus=="ADMIN"){
        echo "<script>window.location='./admin_home.php';</script>";
    }else{
        echo "<script>window.location='./user_home.php';</script>";
    }
}
exit();
?>