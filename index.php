<html>

<head>
    <title>Lame-a-Note : Online Income/Expense Record System</title>
    <link rel="icon" type="image/png" href="./img/icon.png" size="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
</head>

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
    .footer {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1rem;
        background-color: #efefef;
        text-align: center;
    }
    preload {
        width: 100%;
        height: 100%;
        background: #000000;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1;
    }
    .logo {
        width: 500px;
        height: 130px;
        margin: 150px auto 50px auto;
        font-size: 50px;
        text-shadow: 0px 3px 5px #000;
        font-weight: bold;
        text-align: center;
        color: white;
    }
    .preload-frame {
        width: 100px;
        height: 100px;
        margin: auto;
        position: relative;
    }
    .image-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -100px 0 0 -130px;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    @keyframes fadeout {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }
</style>

<body background="./img/loader.png">
    <div class="preload" id="preload">
        <div class="logo">Lame-a-Note</div>
        <div class="preload-frame">
            <img class="image-logo" src="./img/logo.png" width="300" height="200">
        </div>
    </div>
    <script src="./js/loader_script.js"></script>

    <div class="footer">
        Illegal Information: Lame-a-Note ® is an unregistered trademark of Meme Corp. By using this site, you are agreeing to the
        site's terms of use and public policy and WWE policy. © 3000-3018 Meme Corp.
    </div>
</body>

</html>