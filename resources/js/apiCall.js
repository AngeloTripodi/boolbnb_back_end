const addressInput = document.getElementById('address');
const autocompleteList = document.getElementById('autocomplete-list');
const clearAddrInput = document.getElementById('clear-input');

addressInput.addEventListener("keyup", function () {
    const userInput = document.getElementById('address').value;
    console.log(userInput);
    // hide suggestions if input is < 3
    if (userInput.length < 3) {
        autocompleteList.style.display = 'none';
        return;
    }
    // 
    if (userInput.length >= 4) {
        clearAddrInput.classList.remove('d-none');

        const apiUrl = 'https://api.tomtom.com/search/2/geocode/';

        // fix cors policy error
        delete axios.defaults.headers.common['X-Requested-With'];

        axios.get(apiUrl + userInput + '.json', {
            params: {
                key: 'l22YSe5gZiJE598IOyCxIX93kwokqfqn',
                typehead: 'true',
                countrySet: 'IT'
            }
        })
            .then((response) => {
                const results = response.data.results;
                if (results.length > 0) {
                    autocompleteList.innerHTML = '';
                    for (let i = 0; i < 6 && i < results.length; i++) {
                        const element = document.createElement('li');
                        element.textContent = results[i].address.freeformAddress;
                        element.classList.add('py-2', 'list-group-item', 'list-group-item-action');
                        autocompleteList.appendChild(element);
                    }
                    autocompleteList.style.display = 'block';
                } else {
                    // clean html and hide list
                    autocompleteList.innerHTML = '';
                    autocompleteList.style.display = 'none';
                }
                // console.log(response.data.results);
            })
            .catch(function (error) {
                console.log(error);
            })
    }
})

// clear input field and autocomplete list
clearAddrInput.addEventListener('click', function () {
    addressInput.value = '';
    autocompleteList.innerHTML = '';
    autocompleteList.style.display = 'none';
    clearAddrInput.classList.add('d-none');
});

// Click outside ul close suggestion list
document.addEventListener('click', function (e) {
    const ulList = document.getElementById('autocomplete-list');
    // the Node.contains method checks if the clicked element is not contained by the original element.
    if (!ulList.contains(e.target)) {
        // hide list
        autocompleteList.innerHTML = '';
        autocompleteList.style.display = 'none';
    }
});