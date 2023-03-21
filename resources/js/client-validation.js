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
    emailErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Email is invalid`;
  } else {
    emailErrorMessage.innerHTML = '';
  }

  // Validazione password
  if (passwordInput.value.length < 8) {
    passwordErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Password must be at least 8 characters`;
  } else {
    passwordErrorMessage.innerHTML = '';
  }

  // Comparazione password e conferma password
  if (passwordInput.value !== confirmPasswordInput.value) {
    confirmPasswordErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Passwords don't match`;
  } else {
    confirmPasswordErrorMessage.innerHTML = '';
  }

  // Se tutte le validazioni sono corrette, invia il form
  if (emailInput.checkValidity() && passwordInput.value.length >= 8 && passwordInput.value === confirmPasswordInput.value) {
    form.submit();
  }
});

// Nascondi il messaggio di errore quando l'utente inizia a scrivere nell'input
emailInput.addEventListener('input', () => {
  emailErrorMessage.innerHTML = '';
});

passwordInput.addEventListener('input', () => {
  passwordErrorMessage.innerHTML = '';
});

confirmPasswordInput.addEventListener('input', () => {
  confirmPasswordErrorMessage.innerHTML = '';
});
