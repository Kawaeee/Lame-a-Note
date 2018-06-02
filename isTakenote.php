<?php
error_reporting(0);
session_start();
include("connection.php");

$id = $_SESSION["id"];
$amount = $_POST["amount"];
$type = $_POST["type"];
$date = $_POST["date"];
$note = $_POST["note"];

if($id == null){
    echo "<script>alert('We need you to access this from home site. Try again !!')</script>";
    echo "<script>window.location='./user_home.php';</script>";
}

$query = "INSERT INTO `data` (`p_id`,`id`, `amount`, `type`, `date`,`note`) VALUES ( null,?,?,?,?,?)";
$prequery = $conn->prepare($query);
$prequery->bind_param("iiiss",$id,$amount,$type,$date,$note);

if($amount<=0) {
    echo "<script>alert('Your amount number is not positive integer. Try again !!')</script>";
    echo "<script>window.location='./takenote.php';</script>";
} else {
    $prequery->execute();
    if(mysqli_affected_rows($conn) >= 1){
        echo "<script>alert('Take note Successful !!')</script>";
        echo "<script>window.location='./user_home.php';</script>";
    }else{
        echo "<script>alert('Error Occurred !!')</script>";
        echo "<script>window.location='./user_home.php';</script>";
    } 
}
exit();
?>