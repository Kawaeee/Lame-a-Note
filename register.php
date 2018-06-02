<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
include("connection.php");

$validuser = "SELECT `username`,`email` FROM `user` WHERE 1";
$check = false;
$existuser = mysqli_query($conn,$validuser);

$user = $_POST["reuser"];
$pass = $_POST["repass"];
$name = $_POST["rename"];
$email = $_POST["reemail"];
$repass = $_POST["remorepass"];

if($pass != $repass){
    echo "<script>alert('Your password and repeat password are not the same. Try Again!!!')</script>";
    echo "<script>window.location='./login.php';</script>";
}else if(strlen($pass) <=1 or strlen($pass) >16  or  strlen($user) <= 1 or strlen($user) > 16 or strlen($name) <1 or strlen($name) >32) {
    echo "<script>alert('We allow you to have username,password only from 2-16 characters,name only 2-32 characters. Try Again!!!')</script>";
    echo "<script>window.location='./login.php';</script>";
}
else if (preg_match('/\s/',$user) or preg_match('/\s/',$pass)){
    echo "<script>alert('Your username or password contain white space. Try Again!!!')</script>";
    echo "<script>window.location='./login.php';</script>";   
}
else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user) or preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass)){
    echo "<script>alert('Your username or password contain special characters. Try Again!!!')</script>";
    echo "<script>window.location='./login.php';</script>";   
}else{
    
$query = "INSERT INTO `user` (`id`,`username`, `password`, `name`, `email`,`status`,`created_date`) VALUES ( null,?,?,?,?, 'USER',CURRENT_DATE)";
$prequery = $conn->prepare($query);
$prequery->bind_param("ssss",$user,$pass,$name,$email);

while($obj = mysqli_fetch_object($existuser)){

    if($_POST["reuser"] == $obj->username or $_POST["reemail"] == $obj->email ){
        echo "<script>alert('This Username or Email already existed. Try Again!!')</script>";
        echo "<script>window.location='./login.php';</script>";
        $check = false;
    }else{
        $check = true;
    }
}

if($check==true){
    echo "<script>alert('Register Successfully!!')</script>";
    echo "<script>window.location='./login.php';</script>";
    $prequery->execute();
}

}
exit();
?>