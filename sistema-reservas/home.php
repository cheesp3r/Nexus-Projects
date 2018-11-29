<!doctype html>
<html lang="pt-br">
    <head>
        <title> Nexus </title>
        <meta charset='utf-8'>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <style>
            body { background-image: url("img/bg3.jpg"); }
        </style>
    </head>
    <body>
        <!-- Conecta ao DB -->
        <?php
            include_once("dbcon.php");
        ?>
        <!-- DIV INICIAL (HOME) -->
        <div class="div_init">
            <p class="p">Reservas</p>
            <button class="btn2" onclick="navNovaReserva()">Nova Reserva</button>
            <br><br>
            <button class="btn2" onclick="verReservas()">Ver Reservas</button>
            <br><br>
            <button id="btn_logout" class="btn_voltar" onclick="logout()">Logout</button>
        </div>
        <script src="js/script.js"></script>
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
        <script>
            function logout(){
                firebase.auth().signOut().then(function() {
                    alert('Logout realizado com sucesso')
                    window.location = ('index.php');
                }).catch(function(error) {
                alert('Error: ' + errorMessage);
                });
            }
        </script>
    </body>
</html>
