function checkPassword() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("password-confirm").value;

    if (pass1 == pass2) {
        alert("Passwords match");
        return true;
    }

    else {
        alert("Passwords do not match");
        return false;
    }
}

document.querySelector('form').addEventListener('submit', function (e) {
    //Prevent default behaviour
    e.preventDefault();
    //Check passwords
    if (checkPassword()) {
        this.submit();
    }
});