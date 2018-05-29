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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Courgette|Dosis|Maven+Pro|Orbitron|Pridi|Righteous|Sriracha" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        overflow: hidden;
        right: 20%;
        background-color: #337171;
        min-width: 133px;
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
        color: white;
      }
      th,tr{
       font-size: 20px;
       font-weight: 1000;
      }
      .float{
	      position:fixed;
	      width:60px;
	      height:60px;
	      bottom:40px;
	      right:40px;
	      background-color:#0C9;
	      color:#FFF;
	      border-radius:20px;
	      text-align:center;
	      box-shadow: 1px 2px 3px #999;
      }
      .my-float{
	      margin-top:15px;
      }
      .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        left: 0;
        top: 0;
        width: 100%;
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
      }
      .modal-content {
        background-color: #fefefe;
        margin: 15% auto; 
        padding: 20px;
        border: 1px solid #888;
        width: 50%; 
      }
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      .close:hover, .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
      h7 {
        font-size:15;
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
            <a class="nav-item nav-link"  style="font-size: 20px; font-weight: bold;" ><i class="fa fa-user-circle-o" aria-hidden="true">&nbsp;</i><?php echo $objResult["name"];?></a>
            <div class="dropdown-content">
              <a href="./editPro.php"><i class="fa fa-cog" aria-hidden="true"></i>  Edit Profile</a>
              <a href="./logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Logout</a>
            </div>
          </li> 
        </div>
    </nav>
    
    <br>
    <div align="center">
      <img src="./img/logo.png" width="100" height="60" />
      <form class="form-group "method="POST" action="./isEdit.php" >
        <div class="form-group"><label>Name<input type="text" class="form-control" name="upname" value="<?php echo $objResult["name"]; ?>" required></label></div>
        <div class="form-group"><label>Status<input type="text" class="form-control" name="upstatus" value="<?php echo $objResult["status"]; ?>" readonly></label></div>
        <div class="form-group"><label>Username<input type="text" class="form-control" name="upusername" value="<?php echo $objResult["username"]; ?>" readonly></label></div>
        <div class="form-group"><label>Email<input type="email" class="form-control" name="upemail"  value="<?php echo $objResult["email"]; ?>" required></label></div>
        <div class="form-group"><label>Created Date<input type="date" class="form-control" name="update"  value="<?php echo $objResult["created_date"]; ?>" readonly></label></div>
        <div class="form-group"><label>Input your password to edit your information<input type="password" class="form-control" name="uppass" required></label></div>
        <button type = "submit" class="btn btn-danger"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i></span> Submit</button>
        <td><a href="./user_home.php" class="btn btn-primary"><i class="fa fa-reply" aria-hidden="true"></i> Back</a></td>
      </form>
    </div>

    <a href="#" class="float" id="help">
      <i class="fa fa-info-circle fa-2x my-float" aria-hidden="true"></i>
    </a>

    <div align="center">
      <div id="help_form" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h3><i class="fa fa-info-circle" aria-hidden="true"></i> Get Started<h3>    
          <h5>Welcome to Lame-a-Note : Online Income/Expense Record System <h5>    
          <h7>You can take note by clicking on Take note button :3<h7><br>
          <h7>You can edit your profile by hover on <i class="fa fa-user-circle-o" aria-hidden="true"></i> your name,<h7>
          <h7>You will see this <i class="fa fa-cog" aria-hidden="true"></i> Edit Profile button :3<h7><br>
          <h7>You can sort your data by clicking at table head (Date,Amount,etc)<h7>
        </div>
      </div>
    </div>

<script>
var modal = document.getElementById('help_form');
var btn = document.getElementById("help");
var close = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}
close.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>

</html>