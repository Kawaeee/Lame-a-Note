<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
include("connection.php");

$username  = $_POST["usr"];
$password  = $_POST["pwd"];
$strSQL    = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
$objQuery  = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
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