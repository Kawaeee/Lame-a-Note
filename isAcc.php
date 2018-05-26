<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
error_reporting(0);
include("connection.php");
session_start();

$fouser  = $_POST["fouser"];
$fodate  = $_POST["fodate"];
$foemail  = $_POST["foemail"];

$forfo = "SELECT * FROM `user` WHERE created_date = '$fodate' AND username ='$fouser' AND email = '$foemail'";
$objQuery  = mysqli_query($conn, $forfo);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

if (!$objResult) {
    echo "<script>alert('Your username or email or created date are incorrect.Try again!!')</script>";
    echo "<script>window.location='./login.php';</script>";
}
//exit();
?>
<html>

<head>
    <title>Lame-a-Note : Online Income/Expense Record System</title>
    <link rel="icon" type="image/png" href="./img/icon.png" size="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
</head>
<style>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: "Impact";
        background-repeat: no-repeat;
        background-size: cover;
    }
    div {
    background-color: white;
    border: 20px solid grey;
    margin: 15% auto; 
    padding: 20px;
    width: 60%; 
}
</style>
<body background="./img/loader.png">
 <div>
 Your Account information<br><br>
 <label>Username : </label> &nbsp;&nbsp; <input type="text" value="<?php echo $objResult["username"]; ?>" readonly><br>
 <label>Password : </label> &nbsp;&nbsp; <input type="text" value="<?php echo $objResult["password"]; ?>" readonly><br>
 <label>Name : </label> &nbsp;&nbsp; <input type="text" value="<?php echo $objResult["name"]; ?>" readonly><br>
 <label>Email : </label>&nbsp;&nbsp;<input type="text" value="<?php echo $objResult["email"]; ?>" readonly><br>
 <label>Created Date : </label>&nbsp;&nbsp;<input type="text" value="<?php echo $objResult["created_date"]; ?>" readonly><br>
 <label>Status : </label>&nbsp;&nbsp;<input type="text" value="<?php echo $objResult["status"]; ?>" readonly><br>
 <br>**Keep it secret for your security eiei. :3


</div>
</body>
</html>