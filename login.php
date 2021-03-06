<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include("connection.php");
?>

<html>

<head>
    <title>Lame-a-Note : Login</title>
    <link rel="icon" type="image/png" href="./img/icon.png" size="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <script src="./js/validation.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: "Arial";
            font-size: 14px;
            background-repeat: no-repeat;
            background-size: cover;
        }
        body,h3,p {
            margin: 0;
            padding: 0;
        }
        .login-box {
            width: 400px;
            height: 290px;
            padding: 10px;
            margin: 200px auto 0 auto;
            background: rgba(0, 0, 0, 0.4);
            border: 2px solid white;
            border-radius: 3px;
        }
        .header {
            width: 380px;
            height: 50px;
            display: inline-flex;
            color: #ffffff;
        }
        .icon-block {
            width: 50px;
            height: 50px;
            padding: 2px;
        }
        .icon-user, .icon-password {
            width: 25px;
            height: 25px;
        }
        .title {
            width: 310px;
            height: 50px;
            padding: 10px 0 0 5px;
        }
        .login {
            width: 376px;
            height: 205px;
            padding: 7px;
            margin-top: 10px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 3px;
        }
        .input-group {
            width: 100%;
            height: 40px;
            margin-top: 15px;
            display: inline-flex;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid black;
            border-radius: 3px;
        }
        .input-group-addon {
            font-size: 14px;
            padding: 7px 10px;
        }
        .input-control {
            width: 100%;
            height: 38px;
            padding-left: 5px;
            border: none;
            outline: none;
            background: none;
            border-radius: 0 1px 1px 0;
            color: snow;
            font-size: 16px;
            font-weight: 600;
        }
        .button-control {
            padding: 10px 15px;
            color: white;
            background: rgba(0, 0, 0, 0.7);
            font-weight: 600;
            border: 1px solid white;
            outline: none;
            border-radius: 3px;
            margin-top: 30px;
            display: block;
            margin-right: auto;
            margin-left: auto;
        }
        .button-control:hover {
            transition: all 0.4s;
            box-shadow: -3px 4px 4px rgba(0, 0, 0, 0.5);
        }
        .button-re{
            font-weight: 600;
            color: white;
            background: rgba(0, 0, 0, 1);
            border: 1px solid white;
            outline: none;
            border-radius: 3px;
        }
        .button-re:hover{
            transition: all 0.4s;
            box-shadow: -3px 4px 4px rgba(0, 0, 0, 5);
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
        .close,.close1 {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,.close:focus,.close1:hover,.close1:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
         .button-fo{
            font-weight: 70;
            color: white;
            background: rgba(50, 15, 25, 0.1);
            border: 1px solid white;
            outline: none;
            border-radius: 3px;
        }
        .button-fo:hover{
            transition: all 0.4s;
            box-shadow: -2px 4px 4px rgba(0, 0, 0, 5);
        }
    </style>
</head>

<body background="./img/loader.png">

    <div class="login-box">

        <div class="header">
            <img src="./img/secure.png" class="icon-block">
            <div class="title">
                <h3>Login</h3>
                <p>Please login with your account</p>
            </div>
            <button type="button" id="btnre" class="button-re">Register</button>
        </div>

        <div class="login">
            <form name="login-form" id="login" action="./isLogin.php" method="POST">
                <div class="input-group" id="ig_username">
                    <span class="input-group-addon">
                        <img src="./img/user.png" class="icon-user" id="iconUser">
                    </span>
                    <input type="text" class="input-control" id="username" name="usr" onkeyup="validate()">
                </div>

                <div class="input-group" id="ig_password">
                    <span class="input-group-addon">
                        <img src="./img/password.png" class="icon-password" id="iconPass">
                    </span>
                    <input type="password" class="input-control" id="password" name="pwd" onkeyup="validate()">
                </div>

                    <input type="submit" value="Login" class="button-control">
                    <button type="button" id="btnfo" class="button-fo">Forget Password?</button>

            </form>
        </div>
    </div>


    <div id="register_form" class="modal">

        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Register Form<h3>
            <form name="register-form" id="register" action="./register.php" method="POST">

                <div class="input-group">
                    <span class="input-group-addon">Name</span>
                    <input type="text" class="input-control"  name="rename" placeholder="1-32 characters" required>
                </div>

                <div class="input-group">
                    <span class="input-group-addon">Username</span>
                    <input type="text" class="input-control"  name="reuser" placeholder="2-16 characters without special characters and white space" required>
                </div>

                <div class="input-group">
                    <span class="input-group-addon">Password</span>
                    <input type="password" class="input-control"  name="repass" placeholder="2-16 characters without special characters and white space" required>
                </div>

                <div class="input-group">
                    <span class="input-group-addon">Repeat Password</span>
                    <input type="password" class="input-control"  name="remorepass" placeholder="2-16 without special characters and white space"required>
                </div>

                <div class="input-group">
                    <span class="input-group-addon">Email</span>
                    <input type="email" class="input-control"  name="reemail" placeholder="email@email.com"required>
                </div>

                <input type="submit" value="Register" class="button-control">
            </form>
            <h5>**Try to remember your created date for recover your account.<h5>
        </div>
    </div>

    <div id="forget_pass" class="modal">

        <div class="modal-content">
            <span class="close1">&times;</span>
            <h3>Recover Your Account<h3>
            <form name="forget-form" id="forget" action="./isAcc.php" method="POST">

             <div class="input-group">
                    <span class="input-group-addon">Username</span>
                    <input type="text" class="input-control"  placeholder="2-16 characters without special characters and white space"name="fouser" required>
                </div>

                <div class="input-group">
                    <span class="input-group-addon">Created Date</span>
                    <input type="date" class="input-control" value="<?php echo date('Y-m-d'); ?>" name="fodate" required>
                </div>

                <div class="input-group">
                    <span class="input-group-addon">Email</span>
                    <input type="email" class="input-control"  placeholder="email@email.com" name="foemail" required>
                </div>
                <input type="submit" value="Submit" class="button-control">
            </form>
        </div>
    </div>

<script>
var modal = document.getElementById('register_form');
var forget = document.getElementById("forget_pass");
var btn = document.getElementById("btnre");
var btnfo = document.getElementById("btnfo");
var close = document.getElementsByClassName("close")[0];
var close1 = document.getElementsByClassName("close1")[0];

btn.onclick = function() {
    modal.style.display = "block";
}

btnfo.onclick = function() {
    forget.style.display = "block";
}

close.onclick = function() {
    modal.style.display = "none";
}
close1.onclick = function() {
    forget.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == forget) {
        forget.style.display = "none";
    }
}
</script>
</body>

</html>