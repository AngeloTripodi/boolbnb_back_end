
function checkForm() {
    let pass1 = document.getElementById("password").value;
    let pass2 = document.getElementById("password-confirm").value;
    const passMatchElement = document.getElementById('psw-match');
    const passLenElement = document.getElementById('psw-length');
    const emailElement = document.getElementById('validate-email');


    if ((pass1.length > 7) && (pass1 == pass2) && validateEmail()) {
        return true;
        
    } else if (!validateEmail()){
        console.log("email a gallina");
        emailElement.innerHTML += `<p class="text-danger pt-1"><i class="fa-solid fa-circle-exclamation pe-1"></i> Email is invalid </p>`;
        return false;

    } else if (pass1.length < 7) {
        console.log("Password must be at least 8 characters");
        passLenElement.innerHTML += `<p class="text-danger pt-1"><i class="fa-solid fa-circle-exclamation pe-1"></i> Password must be at least 8 characters </p>`;
        return false;
    }
    else if (pass1 != pass2) {
        console.log("Passwords do not match");
        passMatchElement.innerHTML += `<p class="text-danger pt-1"><i class="fa-solid fa-circle-exclamation pe-1"></i> Passwords don't match </p>`
        return false;
    }
}


function validateEmail() {
    let email = document.getElementById("email").value;
    const res = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return res.test(String(email).toLowerCase());
  }


document.querySelector('form').addEventListener('submit', function (e) {
    //Prevent default behaviour
    e.preventDefault();
    //Check passwords
    if (checkForm()) {
        this.submit();
    }
});
