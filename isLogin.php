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
    header("location:./login.php");
} else {
    $_SESSION["id"]     = $objResult["id"];
    $_SESSION["status"] = $objResult["status"];
    
    session_write_close();
    
    if ($objResult["status"] == "ADMIN") {
        header("location:./admin_home.php");
    } else {
        header("location:./user_home.php");
    }
}
mysqli_close($conn);
?>