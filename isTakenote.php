<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
$db       = "lameanote_db"; // db name
$host     = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";

$conn->query("INSERT INTO `data` (`p_id`,`id`, `amount`, `type`, `date`,`note`) VALUES ( null,'" . $_SESSION["id"] . "' , '" . $_POST["amount"] . "', '" . $_POST["type"] . "' , '" . $_POST["date"] . "' , '" . $_POST["note"] . "')");

header("location:./user_home.php");
exit();
?>