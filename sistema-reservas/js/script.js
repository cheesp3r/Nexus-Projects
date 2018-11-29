function maxPessoas(){

    var localizacao = document.getElementById('local').value;

    if (localizacao === 'Deck'){
        document.getElementById('quantPessoas').max = 50;
    } else if (localizacao === 'Calçada') {
        document.getElementById('quantPessoas').max = 90;
    } else if (localizacao === 'Lateral') {
        document.getElementById('quantPessoas').max = 90;
    } else if (localizacao === 'Salão Interno') {
        document.getElementById('quantPessoas').max = 40;
    }
    document.getElementById('quantPessoas').value = 1;
}

function navNovaReserva() {
    window.location = ('nova-reserva.php');
}

function back() {
    window.location = ('home.php');
}

function verReservas(){
    window.location = ('lista-reservas.php');
}

/*
var user = firebase.auth().currentUser;

firebase.auth().onAuthStateChanged(function(user) {
    var user = firebase.auth().currentUser;
    var userEmail = document.getElementById('email_field').value;
    var userLogged = document.getElementById('lbl_user').innerHTML;
    if (user){
      window.location = ('home.php');
    } else {
        window.location = ('index.php');
    }
});


function login(){
    var userEmail = document.getElementById('email_field').value;
    var userPass = document.getElementById('password_field').value;
    firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;
        alert('Error: ' + errorMessage);
      });
}

function testLogin() {
  var user = firebase.auth().currentUser;
  if (user === userEmail){
      window.location = ("index.php");
  } else {
      alert('Error: ' + errorMessage);
  }
}


function logout(){
    firebase.auth().signOut().then(function() {
        gologin();
      }).catch(function(error) {
        alert('Error: ' + errorMessage);
      });
}
*/

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

function gorecovery(){
    showElementRecovery();
    hideElementLogin();  
}

function gologin(){
    showElementLogin();
    hideElementRecovery();
}


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
