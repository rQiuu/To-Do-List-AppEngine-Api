var password = document.getElementById("password");
var c_password = document.getElementById("confirm_password");

function pass_valid(){

    if(password.value!=c_password.value)
        c_password.setCustomValidity("Passwords don't match!");
    else
        c_password.setCustomValidity("");

}
password.onchange = pass_valid;
confirm_password.onkeyup = pass_valid;