<?php
error_reporting(0);
ini_set('display_errors', 'On');
include("connection.php");
session_start();

$fouser  = $_POST["fouser"];
$fodate  = $_POST["fodate"];
$foemail  = $_POST["foemail"];

if($fouser == null or $fodate == null or $foemail == null){
    echo "<script>alert('We need you to access this from login site. Try again !!')</script>";
    echo "<script>window.location='./login.php';</script>";
}

$query = "SELECT * FROM `user` WHERE created_date = ? AND username = ? AND email = ?";
$prequery = $conn->prepare($query);
$prequery->bind_param("sss",$fodate,$fouser,$foemail);
$prequery->execute();
$result = $prequery->get_result();
$fetchresult = $result->fetch_object();

if (!$fetchresult) {
    echo "<script>alert('Your username or email or created date are incorrect. Try again !!')</script>";
    echo "<script>window.location='./login.php';</script>";
}
?>
<html>

<head>
    <title>Lame-a-Note : Recover Account</title>
    <link rel="icon" type="image/png" href="./img/icon.png" size="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Courgette|Dosis|Maven+Pro|Orbitron|Pridi|Righteous|Sriracha" rel="stylesheet">
    <style>
    * {
        box-sizing: border-box;
    }
    body {
        margin: 0;
        padding: 0;
        background-repeat: no-repeat;
        background-size: cover;
    }
    div.form {
        background-color: #d3d3d3;
        border: 12px solid #555555;
        margin: 10% auto; 
        padding: 20px;
        width: 50%; 
        font-family : 'Dosis';
        font-weight : 900;
    }
</style>
</head>

<body background="./img/loader.png">
    <div class="form">
        Your Account information<br><br>
        <label>Username : </label> &nbsp;&nbsp; <input type="text" class="form-control" value="<?php echo $fetchresult->username ?>" readonly><br>
        <label>Password : </label> &nbsp;&nbsp; <input type="text" class="form-control" value="<?php echo $fetchresult->password; ?>" readonly><br>
        <label>Name : </label> &nbsp;&nbsp; <input type="text"  class="form-control" value="<?php echo $fetchresult->name; ?>" readonly><br>
        <label>Email : </label>&nbsp;&nbsp;<input type="text"  class="form-control" value="<?php echo $fetchresult->email; ?>" readonly><br>
        <label>Created Date : </label>&nbsp;&nbsp;<input type="text" class="form-control" value="<?php echo $fetchresult->created_date; ?>" readonly><br>
        <label>Status : </label>&nbsp;&nbsp;<input type="text"  class="form-control" value="<?php echo $fetchresult->status; ?>" readonly><br>
        <div align ="center"><a href="./login.php" class="btn btn-primary"><i class="fa fa-reply" aria-hidden="true"></i> Back</a></div>
        <br>**Keep it secret for your security EIEI. :3
    </div>
</body>

</html>