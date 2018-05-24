<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include("connection.php");

session_start();
if ($_SESSION['id'] == "") {
  header("location:./login.php");
}

$strSQL    = "SELECT * FROM user WHERE id  = '" . $_SESSION['id'] . "' ";
$objQuery  = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

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
          <a class="nav-item nav-link active" href="./logout.php"><?php echo $objResult["username"];?></a>
        </div>
      </div>
    </nav>
  </body>
  </html>