function checkPassword() {
    var password = document.getElementById("pwd").value;
    var confirmPassword = document.getElementById("cpwd").value;

    if (password !== confirmPassword) {
        alert("Password and confirmation password do not match!");
        return false;
    }

    return true;
}

function enableSignupButton() {
    var checkbox = document.getElementById("terms");
    var signupButton = document.getElementById("signupButton");

    if (checkbox.checked) {
        signupButton.disabled = false;
    } else {
        signupButton.disabled = true;
    }
}
