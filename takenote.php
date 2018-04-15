<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$db       = "lameanote_db"; // db name
$host     = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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


  <body background="bg.png">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #EAF1F9;">
      <a class="navbar-brand meme" id="meme" href="./user_home.php">
        <img src="./img/logo.png" width="150" height="90" />
        <img src="./img/logo_flip.png" width="150" height="90" />
        <a class="navbar-brand" href="#">Lame-a-Note</a>
      </a>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="./takenote.php">Take note</a>
          <a class="nav-item nav-link active" href="./logout.php"><?php echo $objResult["username"];?></a>
        </div>
      </div>
    </nav>
  
    <div align="center">
    <form class="form-group "method="POST" action="./isTakenote.php" >
    <div class="form-group">
    <label>Type<select name = "type" class = "form-control" required> 
   <option value = "1">Income</option>
   <option value = "2">Expense</option>
   </select>
   </label>
   </div>
    <div class="form-group"><label>Amount<input type="number" class="form-control" name="amount" required></label></div>
    <div class="form-group"><label>Date<input type="date" class="form-control" name="date" required></label></div>
    <div class="form-group"><label>Additional Note<textarea class="form-control" name="note" required></textarea></label></div>
    <button type = "submit" class="btn btn-danger"><span class="glyphicon glyphicon-heart"></span> Submit</button>
    <td><a href="./user_home.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Back</a></td>
    </form>
    </div>

  </body>


  </html>