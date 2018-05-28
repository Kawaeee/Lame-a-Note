<?php
include("connection.php");
error_reporting(0);

session_start();
if ($_SESSION['id'] == "") {
  echo "<script>alert('Login before using this site. Thank you!!')</script>";
  echo "<script>window.location='./login.php';</script>";
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
      <link href="https://fonts.googleapis.com/css?family=Courgette|Dosis|Maven+Pro|Orbitron|Pridi|Righteous|Sriracha" rel="stylesheet">
    <style>
      body {
        font-family: 'Righteous', cursive;
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
        border: 4.5px solid #008080;
      }

      li.dropdown {
       display: inline-block;
       float:right;
      }
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #337171;
        min-width: 50px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
       }

      .dropdown-content a {
        color: black;
        position: relative;
        padding: 12px 16px;
        text-decoration: none;
        display: inline-block;
        text-align: left; 
      }

      .dropdown-content a:hover {
        background-color: #002828
        }

      .dropdown:hover .dropdown-content {
        display: inline-block;
      }

     #navbarcolor a{
        color: #C1C1C1;
        text-decoration:none;
     }

     #navbarcolor a:hover {
          color: white;
          text-decoration: none;
     }

     #navbarcolor1 a{
        color: white;
        text-decoration:none;
     }
     td{
      font-family: 'Dosis', sans-serif;
       font-size: 18px;
       font-weight: 600;
       color:white;
     }
     th,tr{
       font-size: 20px;
       font-weight: 1000;
     }
    </style>
  </head>


 <body background="./img/bg.png">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #004d4d;">
      <a class="navbar-brand meme" id="meme" href="./user_home.php  ">
        <img src="./img/logo.png" width="150" height="90" />
        <img src="./img/logo_flip.png" width="150" height="90" />
      </a>
      <ul class="navbar-nav mr-auto">
        <div class="navbar-nav" id="navbarcolor">
          <a class="navbar-brand"  style="font-size:25px;  font-weight: bold;" href="#">Lame-a-Note</a>
          <a class="nav-item nav-link" style="font-size:20px;" href="./takenote.php">Take note</a>
        </div>
      </ul>

        <div class="navbar-nav " id="navbarcolor1">
          <li class="dropdown">
          <a class="nav-item nav-link"  style="font-size: 20px; font-weight: bold;" ><?php echo $objResult["name"];?></a>
            <div class="dropdown-content">
              <a href="./editPro.php">Edit Profile</a>
              <a href="./logout.php">Logout</a>
            </div>
          </li> 
          </div>
    </nav>
    
   <br><br>
    <div align="center">
    <form class="form-group "method="POST" action="./isEdit.php" >
    <div class="form-group"><label>Name<input type="text" class="form-control" name="upname" value="<?php echo $objResult["name"]; ?>" required></label></div>
    <div class="form-group"><label>Status<input type="text" class="form-control" name="upstatus" value="<?php echo $objResult["status"]; ?>" readonly></label></div>
    <div class="form-group"><label>Username<input type="text" class="form-control" name="upusername" value="<?php echo $objResult["username"]; ?>" readonly></label></div>
    <div class="form-group"><label>Email<input type="email" class="form-control" name="upemail"  value="<?php echo $objResult["email"]; ?>" required></label></div>
    <div class="form-group"><label>Created Date<input type="date" class="form-control" name="update"  value="<?php echo $objResult["created_date"]; ?>" readonly></label></div>
    <div class="form-group"><label>Input your password to edit your information<input type="password" class="form-control" name="uppass" required></label></div>
    <button type = "submit" class="btn btn-danger"><span class="glyphicon glyphicon-heart"></span> Submit</button>
    <td><a href="./user_home.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Back</a></td>
    </form>
    </div>

  </body>


  </html>