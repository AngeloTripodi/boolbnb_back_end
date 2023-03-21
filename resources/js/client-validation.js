
function checkPassword() {
    let pass1 = document.getElementById("password").value;
    let pass2 = document.getElementById("password-confirm").value;
    const divElement = document.getElementById('psw-match');
    divElement.innerHTML += `<p class="text-danger pt-1"><i class="fa-solid fa-circle-exclamation pe-1"></i> Passwords don't match </p>`

    if (pass1 == pass2) {

        return true;
    } else {
        console.log("Passwords do not match");
        return false;
    }
}

document.querySelector('form').addEventListener('submit', function(e) {
    //Prevent default behaviour
    e.preventDefault();
    //Check passwords
    if (checkPassword()) {
        this.submit();
    }
});
