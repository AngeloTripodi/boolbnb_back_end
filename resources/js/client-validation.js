
function checkPassword() {
    let pass1 = document.getElementById("password").value;
    let pass2 = document.getElementById("password-confirm").value;
    const divElement = document.getElementById('psw-match');


    if ((pass1.length > 7) && (pass1 == pass2)) {

        return true;
    } else if (pass1.length < 7) {
        console.log("Password must be at least 8 characters");
        divElement.innerHTML += `<p class="text-danger pt-1"><i class="fa-solid fa-circle-exclamation pe-1"></i> Password must be at least 8 characters </p>`;
        return false;
    }
    else if (pass1 != pass2) {
        console.log("Passwords do not match");
        divElement.innerHTML += `<p class="text-danger pt-1"><i class="fa-solid fa-circle-exclamation pe-1"></i> Passwords don't match </p>`
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
