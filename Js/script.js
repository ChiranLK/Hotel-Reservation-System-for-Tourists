var logBtn = document.getElementById("loginBtn");
var signBtn = document.getElementById("signBtn");
var log = document.getElementById("Login");
var sign = document.getElementById("SignUp");
var userInfo = document.querySelector('.userInfo'); // corrected class
var logSign = document.querySelector('.logSign'); // corrected class
var userName = document.getElementById('userName');

logBtn.addEventListener('click', login);
signBtn.addEventListener('click', signup);

function login(){
    log.style.left = "4px";
    sign.style.right = "-520px";
}

function signup(){
    log.style.left = "-510px";
    sign.style.right = "5px";
}