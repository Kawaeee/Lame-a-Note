<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
include("connection.php");

if($_POST["amount"]<=0) {
    echo "<script>alert('Your amount number is not positive integer.Try again!!')</script>";
    echo "<script>window.location='./takenote.php';</script>";
} else {
    $conn->query("INSERT INTO `data` (`p_id`,`id`, `amount`, `type`, `date`,`note`) VALUES ( null,'" . $_SESSION["id"] . "' , '" . $_POST["amount"] . "', '" . $_POST["type"] . "' , '" . $_POST["date"] . "' , '" . $_POST["note"] . "')");
    echo "<script>window.location='./user_home.php';</script>";
}
exit();
?>