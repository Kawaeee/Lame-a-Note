<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
include("connection.php");


$conn->query("INSERT INTO `data` (`p_id`,`id`, `amount`, `type`, `date`,`note`) VALUES ( null,'" . $_SESSION["id"] . "' , '" . $_POST["amount"] . "', '" . $_POST["type"] . "' , '" . $_POST["date"] . "' , '" . $_POST["note"] . "')");

header("location:./user_home.php");
exit();
?>