<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
include("connection.php");
error_reporting(0);

session_start();
if ($_SESSION['id'] == "") {
   echo "<script>alert('Login before using this site. Thank you!!')</script>";
   echo "<script>window.location='./login.php';</script>";
  //header("location:./login.php");
}

$strSQL    = "SELECT * FROM user WHERE id  = '" . $_SESSION['id'] . "' ";
$objQuery  = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

if ($_SESSION['status'] != "ADMIN") {
  echo "<script>alert('This page allows for admin only.Thank you!!')</script>";
  echo "<script>window.location='./user_home.php';</script>";
  //header("location:./login.php");
}
?>

  <html>

  <head>
    <title>Lame-a-Note : Online Income/Expense Record System</title>
    <link rel="icon" type="image/png" href="./img/icon.png" size="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">
    <style>
      body {
        margin: 0;
        padding: 0;
        background-repeat: no-repeat;
        background-size: cover;
      }

      .meme img:last-child {
        display: none;
      }

      .meme:hover img:first-child {
        display: none;
      }

      .meme:hover img:last-child {
        display: inline-block;
      }

      .navbar {
        border: 2px solid snow;
      }

            li.dropdown {
      display: inline-block;
       float:right;
      }
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
       }

      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
      }

      .dropdown-content a:hover {background-color: #f1f1f1}

      .dropdown:hover .dropdown-content {
        display: block;
      }
    </style>

  </head>


  <body background="./img/bg.png">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #EAF1F9;">
      <a class="navbar-brand meme" id="meme" href="./admin_home.php">
        <img src="./img/logo.png" width="150" height="90" />
        <img src="./img/logo_flip.png" width="150" height="90" />
        <a class="navbar-brand" href="#">Lame-a-Note</a>
      </a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="#">Admin</a>
          <a class="nav-item nav-link" href="#">name</a>
          <a class="nav-item nav-link" href="#">is</a>
          <li class="dropdown">
          <a class="nav-item nav-link "><?php echo $objResult["name"];?></a>
            <div class="dropdown-content">
              <a href="./editPro.php">Edit Profile</a>
              <a href="./logout.php">Logout</a>
            </div>
          </li>
        </div>
      </div>
    </nav>
  </body>
  </html>