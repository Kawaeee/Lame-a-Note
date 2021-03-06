<?php
include("connection.php");
error_reporting(0);

session_start();
if ($_SESSION['id'] == "") {
   echo "<script>alert('Login before using this site. Thank you !!')</script>";
   echo "<script>window.location='./login.php';</script>";
}

$strSQL    = "SELECT * FROM user WHERE id  = '" . $_SESSION['id'] . "' ";
$objQuery  = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

$id = $_GET["id"];
if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$id) or strlen((string)$id) >= 5){
    echo "<script>alert('Error Occurred. Try again !!')</script>";
    echo "<script>window.location='./admin_home.php';</script>";
}
else if($id == null){
    echo "<script>alert('We need you to access this from home site. Try again !!')</script>";
    echo "<script>window.location='./admin_home.php';</script>";
}

$query = "SELECT * FROM user,type,data WHERE data.type = type.id AND user.id = ? AND data.id=?";
$prequery = $conn->prepare($query);
$prequery->bind_param("ii",$id,$id);
$prequery->execute();
$result = $prequery->get_result();

if ($_SESSION['status'] != "ADMIN") {
  echo "<script>alert('This page allows for admin only. Thank you !!')</script>";
  echo "<script>window.location='./user_home.php';</script>";
}
?>

  <html>

  <head>
    <title>Lame-a-Note : Online Income/Expense Record System</title>
    <link rel="icon" type="image/png" href="./img/icon.png" size="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Courgette|Dosis|Maven+Pro|Orbitron|Pridi|Righteous|Sriracha" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/lame.css">
  </head>

 <body background="./img/bg.png">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #004d4d;">
      <a class="navbar-brand meme" id="meme" href="./admin_home.php  ">
        <img src="./img/logo.png" width="150" height="90" />
        <img src="./img/logo_flip.png" width="150" height="90" />
      </a>
      <ul class="navbar-nav mr-auto">
        <div class="navbar-nav" id="navbarcolor">
          <a class="navbar-brand"  style="font-size:25px;  font-weight: bold;" href="#">Lame-a-Note</a>
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

<div align = "center">
 <table class="table table-hover" style ="width:60%" >
    <?php 
    $name = "SELECT * FROM user WHERE user.id = $id";
    $namequery  = mysqli_query($conn, $name);
    $nameObj = mysqli_fetch_array($namequery, MYSQLI_ASSOC);
    ?>
    <h8> <?php echo $nameObj["name"];?> <h8>
    <a href="./admin_home.php" class="btn btn-primary"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
      <thead>
        <tr>
          <th style="text-align:center"><font color="#000080">Date</font></a></th>
          <th style="text-align:center"><font color="#000080">Amount</font></a></th>
          <th style="text-align:center"><font color="#000080">Type</font></a></th>
          <th style="text-align:center"><font color="#000080">Note</font></a></th>
        </tr>
      </thead>
      <tbody>
          <?php
            while ($obj = $result->fetch_array()) {
          ?>
                  <div class="container">
                    <tr>
                      <td width="120" style="text-align:center"><font color="#362cb2"><?php echo $obj["date"];?></font></td>
                      <td width="200" style="text-align:center"><font color="#362cb2"><?php echo $obj["amount"]?> Baht</font></td>
                      <?php
                        if($obj["type_name"]=="Income"){
                          $col = "#006400";
                        }else{
                          $col ="#FF0000";   
                        }
                      ?>
                      <td width="100" style="text-align:center"><font color=<?php echo $col; ?>><?php echo $obj["type_name"];?></font></td>
                      <td width="200" style="text-align:center"><font color="#362cb2"><?php echo $obj["note"]?></font></td>
                    </tr>
                  </div>
          <?php
          }
          ?>     
      </tbody>
      </table>
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
        <h7>You can edit your profile by hover on <i class="fa fa-user-circle-o" aria-hidden="true"></i> your name,<h7>
        <h7>You will see this <i class="fa fa-cog" aria-hidden="true"></i> Edit Profile button :3<h7><br>
        <h7>You can see all user data by clicking <i class="fa fa-bolt" aria-hidden="true"></i> See Data to see specific information on account<h7>
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