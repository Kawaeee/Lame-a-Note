<?php
error_reporting(0);
session_start();
include("connection.php");

$username = $_POST["usr"];
$password = $_POST["pwd"];

if($username == null or $password == null){
    echo "<script>alert('We need you to access this from login site.Try again!!')</script>";
    echo "<script>window.location='./login.php';</script>";
}

$strSQL = "SELECT * FROM user WHERE username = ? AND password = ?";
$prequery = $conn->prepare($strSQL);
$prequery->bind_param("ss",$username,$password);
$prequery->execute();
$result = $prequery->get_result();
$objResult = $result->fetch_array();


if (!$objResult) {
    echo "<script>alert('Your username or password are incorrect.Try again!!')</script>";
    echo "<script>window.location='./login.php';</script>";
} else {
    $_SESSION["id"]     = $objResult["id"];
    $_SESSION["status"] = $objResult["status"];
    
    session_write_close();
    
    if ($objResult["status"] == "ADMIN") {
        echo "<script>alert('Login successful !!')</script>";
        echo "<script>window.location='./admin_home.php';</script>";
    } else {
        echo "<script>alert('Login successful !!')</script>";
        echo "<script>window.location='./user_home.php';</script>";
    }
}
mysqli_close($conn);
?>