const form = document.getElementById('validate-form');
const titleInput = document.getElementById('title');
const addressInput = document.getElementById('address');
const roomsInput = document.getElementById('n_rooms');
const bedsInput = document.getElementById('n_beds');
const bathroomsInput = document.getElementById('n_bathrooms');
const mqInput = document.getElementById('square_meters');
const servicesInput = document.querySelectorAll('input[type="checkbox"]');



const titleErrorMessage = document.getElementById('title-error-message');
const addressErrorMessage = document.getElementById('address-error-message');
const roomsErrorMessage = document.getElementById('rooms-error-message');
const bedsErrorMessage = document.getElementById('beds-error-message');
const bathroomsErrorMessage = document.getElementById('bathrooms-error-message');
const mqErrorMessage = document.getElementById('mq-error-message');
const servicesErrorMessage = document.getElementById('services-error-message');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    // Validazione titolo
    if (titleInput.value.length < 2 || titleInput.value.length > 150) {
        titleErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Name must be between 2 and 150 characters`;
    } else {
        titleErrorMessage.innerHTML = '';
    }

    // Validazione indirizzo
    if (addressInput.value.length < 2 || addressInput.value.length > 150) {
        addressErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Address must be between 3 and 255 characters`;
    } else {
        addressErrorMessage.innerHTML = '';
    }

    // Validazione stanze
    if (roomsInput.value < 1 || roomsInput.value > 20) {
        roomsErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Number of rooms must be between 1 and 20`;
    } else {
        roomsErrorMessage.innerHTML = '';
    }

    // Validazione letti
    if (bedsInput.value < 1 || bedsInput.value > 30) {
        bedsErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Number of rooms must be between 1 and 30`;
    } else {
        bedsErrorMessage.innerHTML = '';
    }

    // Validazione bagni
    if (bathroomsInput.value < 0 || bathroomsInput.value > 25) {
        bathroomsErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Number of beds must be between 0 and 25`;
    } else {
        bathroomsErrorMessage.innerHTML = '';
    }

    // Validazione mq
    if (mqInput.value < 10 || mqInput.value > 2000) {
        mqErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Number of beds must be between 10 and 2000`;
    } else {
        mqErrorMessage.innerHTML = '';
    }

    // // inizializza una variabile che rappresenta lo stato di selezione
    let isChecked = false;

    // // itera su tutti gli elementi checkbox e verifica se almeno uno è selezionato
    for (let i = 0; i < servicesInput.length; i++) {
        if (servicesInput[i].checked) {
            isChecked = true;
            break;
        }
    }

    // Validazione servizi
    // // controlla se almeno una casella di controllo è selezionata
    if (!isChecked) {
        servicesErrorMessage.innerHTML = `<i class="fa-solid fa-circle-exclamation pe-1"></i> Select at least one service`;
    } else {
        servicesErrorMessage.innerHTML = '';
    }

    if (
        titleErrorMessage.innerHTML == '' &&
        addressErrorMessage.innerHTML == '' &&
        roomsErrorMessage.innerHTML == '' &&
        bedsErrorMessage.innerHTML == '' &&
        bathroomsErrorMessage.innerHTML == '' &&
        mqErrorMessage.innerHTML == '' &&
        servicesErrorMessage.innerHTML == ''
    ) {
        console.log('ciao')
        // Nessun errore, invia il form
        form.submit();
    }


});


// Nascondi il messaggio di errore quando l'utente inizia a scrivere nell'input
titleInput.addEventListener('input', () => {
    titleErrorMessage.innerHTML = '';
});

addressInput.addEventListener('input', () => {
    addressErrorMessage.innerHTML = '';
});

roomsInput.addEventListener('input', () => {
    roomsErrorMessage.innerHTML = '';
});

bedsInput.addEventListener('input', () => {
    bedsErrorMessage.innerHTML = '';
});

bathroomsInput.addEventListener('input', () => {
    bathroomsErrorMessage.innerHTML = '';
});

mqInput.addEventListener('input', () => {
    mqErrorMessage.innerHTML = '';

});

// servicesInput.addEventListener('input[type="checkbox"]', () => {
//     servicesErrorMessage.innerHTML = '';

// });
