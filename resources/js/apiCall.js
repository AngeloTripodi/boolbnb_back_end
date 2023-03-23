const addressInput = document.getElementById('address');

addressInput.addEventListener("keyup", function(){
    const userInput = document.getElementById('address').value;
    console.log(userInput);

    const apiUrl = 'https://api.tomtom.com/search/2/geocode/';

    delete axios.defaults.headers.common['X-Requested-With'];
    
    axios.get(apiUrl + userInput + '.json', {
        params:{
            key: 'l22YSe5gZiJE598IOyCxIX93kwokqfqn',
            typehead: 'true',
            countrySet: 'IT'
        }
    })
    .then( (response) => {
        console.log(response.data.results);
    })
    .catch(function (error) {
        console.log(error);
    })
})