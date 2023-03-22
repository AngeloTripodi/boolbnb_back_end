const form = document.querySelector('form');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('password-confirm');
const emailErrorMessage = document.getElementById('email-error-message');
const passwordErrorMessage = document.getElementById('password-error-message');
const confirmPasswordErrorMessage = document.getElementById('confirm-password-error-message');
const nameInput = document.getElementById('name');
const lastNameInput = document.getElementById('last_name');
const nameErrorMessage = document.getElementById('name-error-message');
const lastNameErrorMessage = document.getElementById('last-name-error-message');
const dobInput = document.getElementById('date_of_birth');
const dobErrorMessage = document.getElementById('dob-error-message');
const dobMinDate = new Date('1990-01-01');
const dobMaxDate = new Date();

form.addEventListener('submit', (event) => {
  event.preventDefault();

  // Validazione nome
  if (nameInput.value.length > 0 && nameInput.value.length < 2) {
    nameErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Name must be at least 2 characters`;
  } else {
    nameErrorMessage.innerHTML = '';
  }

  // Validazione cognome
  if (lastNameInput.value.length > 0 && lastNameInput.value.length < 2) {
    lastNameErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Last name must be at least 2 characters`;
  } else {
    lastNameErrorMessage.innerHTML = '';
  }

  // Validazione data di nascita
  const dobDate = new Date(dobInput.value);
  if (dobDate < dobMinDate || dobDate > dobMaxDate) {
    dobErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Date of birth must be between ${dobMinDate.toLocaleDateString()} and ${dobMaxDate.toLocaleDateString()}`;
  } else {
    dobErrorMessage.innerHTML = '';
  }

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

nameInput.addEventListener('input', () => {
  nameErrorMessage.innerHTML = '';
});

lastNameInput.addEventListener('input', () => {
  lastNameErrorMessage.innerHTML = '';
});

dobInput.addEventListener('input', () => {
  dobErrorMessage.innerHTML = '';
});
