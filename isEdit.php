<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
error_reporting(0);
include("connection.php");
session_start();

$upname  = $_POST["upname"];
$upemail  = $_POST["upemail"];
$uppass  = $_POST["uppass"];
$upuser = $_POST["upusername"];
$upstatus = $_POST["upstatus"];
$edit = "UPDATE `user` SET `name`='$upname',`email`='$upemail' WHERE `password` ='$uppass' AND `username` = '$upuser'";
$objQuery  = mysqli_query($conn, $edit);

if(mysqli_affected_rows($conn) == 1){
    echo "<script>alert('Update Successful !!')</script>";
    if($upstatus=="ADMIN"){
        echo "<script>window.location='./admin_home.php';</script>";
        //header("location:./admin_home.php");
    }else{
        echo "<script>window.location='./user_home.php';</script>";
        //header("location:./user_home.php");
    }
}
else{
    echo "<script>alert('Your password is incorrect.Try again!!')</script>";
    if($upstatus=="ADMIN"){
        echo "<script>window.location='./admin_home.php';</script>";
        //header("location:./admin_home.php");
    }else{
        echo "<script>window.location='./user_home.php';</script>";
        //header("location:./user_home.php");
    }
}
exit();
?>