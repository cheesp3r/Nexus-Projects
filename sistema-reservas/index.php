<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <style>
            body { background-image: url("img/bg3.jpg"); }
        </style>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
        <script src="js/script.js"></script>
    </head>
    <body>
    <!-- LOGIN AND RECOVERY BLOCKS AREA START -->
            <div class="front" id="login">
                <p class="p">LOGIN</p>
                <input type="email" class="input" name="txt_email" placeholder="Email" spellcheck="false" id="email_field">
                <br><br>
                <input type="password" class="input" name="txt_password" placeholder="Senha" id="password_field">
                <br><br>
                <button class="btn" id="btn_login" onclick="login()">Login</button>
                <br><br>
                <label class="lbl">Esqueceu a Senha? </label>
                <button id="btn_go_pag_recovery" class="btn2" onclick="gorecovery()">Recupere a Conta</button>
            </div>
            <div class="back" id="recovery" hidden>
                <p class="p">Recuperação</p>
                <input type="email" class="input" name="txt_email" placeholder="Email" spellcheck="false" id="emailRecovery">
                <br><br>
                <button id="btn_recovery" class="btn" onclick="recovery()">Recuperar Conta</button>
                <br><br>
                <label class="lbl">Já tem uma conta? </label>
                <button id="btn_go_pag_login" class="btn2" onclick="gologin()">Login</button>
            </div>
            <div id="div" class="div" hidden>
                <p class="p">Bem Vindo</p>
                <label id="lbl_user">You are logged as: </label>
                <br><br>
            </div>
    <!-- LOGIN AND RECOVERY BLOCKS AREA START -->
    <!-- SCRIPTS ÁREA START-->
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
    <script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyBNUlKHrjwobsnu7YYIFed633aA2WRi-p8",
        authDomain: "reserva-ad2cd.firebaseapp.com",
        databaseURL: "https://reserva-ad2cd.firebaseio.com",
        projectId: "reserva-ad2cd",
        storageBucket: "reserva-ad2cd.appspot.com",
        messagingSenderId: "691167603447"
    };
    firebase.initializeApp(config);
    </script>
        <script src="js/script.js"></script>
        <script>
            function login(){
                var userEmail = document.getElementById('email_field').value;
                var userPass = document.getElementById('password_field').value;
                firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
                var errorCode = error.code;
                var errorMessage = error.message;
                alert('Error: ' + errorMessage);
                });
            }
        </script>
        <script>
            var user = firebase.auth().currentUser;
            firebase.auth().onAuthStateChanged(function(user) {
                var user = firebase.auth().currentUser;
                var userEmail = document.getElementById('email_field').value;
                var userLogged = document.getElementById('lbl_user').innerHTML;
                if (user){
                window.location = ('home.php');
                }
            });
        </script>
        <script>
            function gorecovery(){
                showElementRecovery();
                hideElementLogin();  
            }
            function gologin(){
                showElementLogin();
                hideElementRecovery();
            }
        </script>
        <script>
            function showElementLogin(){
                document.getElementById("login").style.display = "block";
            }
            function hideElementLogin(){
                document.getElementById("login").style.display = "none";
            }

            function showElementRecovery(){
                document.getElementById("recovery").style.display = "block";
            }
            function hideElementRecovery(){
                document.getElementById("recovery").style.display = "none";
            }
        </script>
        <script>
            function recovery(){
                var emailUser = document.getElementById('emailRecovery').value;
                var auth = firebase.auth();
                var emailAddress = emailUser;

                auth.sendPasswordResetEmail(emailAddress).then(function() {
                alert('Verifique o seu E-Mail')
                }).catch(function(error) {
                alert(error);
                });
            }
        </script>
    <!-- SCRIPTS AREA END-->
    </body>
</html>
