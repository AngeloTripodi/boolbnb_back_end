const form = document.querySelector('form');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('password-confirm');
const emailErrorMessage = document.getElementById('email-error-message');
const passwordErrorMessage = document.getElementById('password-error-message');
const confirmPasswordErrorMessage = document.getElementById('confirm-password-error-message');

form.addEventListener('submit', (event) => {
  event.preventDefault();

  // Validazione email
  if (!emailInput.checkValidity()) {
    emailErrorMessage.innerText = 'Email is invalid';
  } else {
    emailErrorMessage.innerText = '';
  }

  // Validazione password
  if (passwordInput.value.length <= 8) {
    passwordErrorMessage.innerText = 'Password must be at least 8 characters';
  } else {
    passwordErrorMessage.innerText = '';
  }

  // Comparazione password e conferma password
  if (passwordInput.value !== confirmPasswordInput.value) {
    confirmPasswordErrorMessage.innerText = "Passwords don't match";
  } else {
    confirmPasswordErrorMessage.innerText = '';
  }

  // Se tutte le validazioni sono corrette, invia il form
  if (emailInput.checkValidity() && passwordInput.value.length >= 8 && passwordInput.value === confirmPasswordInput.value) {
    form.submit();
  }
});

// Nascondi il messaggio di errore quando l'utente inizia a scrivere nell'input
emailInput.addEventListener('input', () => {
  emailErrorMessage.innerText = '';
});

passwordInput.addEventListener('input', () => {
  passwordErrorMessage.innerText = '';
});

confirmPasswordInput.addEventListener('input', () => {
  confirmPasswordErrorMessage.innerText = '';
});
