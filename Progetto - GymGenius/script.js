function validaForm_signin() {
    var email = document.signin_form.email.value;
    if (email == "") {
        alert("Inserisci indirizzo email")
        return false;
    }

    var email_regex = /^\S+@\S+\.\S+$/;
    if (!email.match(email_regex)) {
        alert("Inserisci indirizzo email valido");
        return false;
    }

    var password = document.signin_form.password.value;
    if (password== "") {
        alert("Inserisci password")
        return false;
    }

    //andrà inserito un controllo per verificare se l'utente si trova nella base di dati
    //alert("Dati inseriti correttamente")
    return true;
}

function validaForm_signup() {
    var nome = document.signup_form.nome.value;
    if (nome == "") {
        alert("Inserisci nome");
        return false;
    }

    var cognome = document.signup_form.cognome.value;
    if (cognome == "") {
        alert("Inserisci cognome");
        return false;
    }

    var data_nascita = document.signup_form.data_nascita.value;
    if (data_nascita == "") {
        alert("Inserisci data di nascita");
        return false;
    }

    var sesso = document.signup_form.sesso.value;
    if (sesso == "nulla") {
        alert("Inserisci sesso");
        return false;
    }

    var email = document.signup_form.email.value;
    if (email == "") {
        alert("Inserisci indirizzo email")
        return false;
    }

    var email_regex = /^\S+@\S+\.\S+$/;
    if (!email.match(email_regex)) {
        alert("Inserisci indirizzo email valido");
        return false;
    }

    var pwd_1 = document.signup_form.pwd_1.value;
    var pwd_2 = document.signup_form.pwd_2.value;
    if (pwd_1 == "") {
        alert("Inserisci password")
        return false;
    }
    if (pwd_2 == "") {
        alert("Conferma password");
        return false;
    }
    if (pwd_1 != pwd_2){
        alert("La password non coincidono");
        return false;
    }
    if (document.signup_form.token.value != '') {
        var tipo_trainer = document.signup_form.tipo_trainer.value;
        if (tipo_trainer == "nulla") {
            alert("Inserisci tipologia trainer");
            return false;
        }
    }

    if (document.signup_form.tipo_trainer.value != 'nulla') {
        var token = document.signup_form.token.value;
        if (token == '') {
            alert("Inserisci token");
            return false;
        }
    }

    return true;
}

function validaForm_coach() {

    var nome = document.coach_form.nome.value;
    if (nome == '') {
        alert("Si prega di effettuare l'accesso");
        return false;
    }

    var allenatore = document.coach_form.allenatore.value;
    if (allenatore == "nulla") {
        alert("Scegli un professionista del nostro team");
        return false;
    }

    var altezza = document.coach_form.altezza.value;
    if (altezza == "" || isNaN(altezza)) {
        alert("Inserisci altezza");
        return false;
    }
    if (altezza <= 0) {
        alert("Inserisci un'altezza corretta");
        return false;
    }

    var peso = document.coach_form.peso.value;
    if (peso == "" || isNaN(peso)) {
        alert("Inserisci peso");
        return false;
    }
    if (peso <= 0) {
        alert("Inserisci un peso corretto");
        return false;
    }


    var frequenza = document.coach_form.frequenza.value;
    if (frequenza == "nulla") {
        alert("Inserisci frequenza di allenamento");
        return false;
    }

    var obiettivi = document.coach_form.obiettivi.value;
    if (obiettivi == "") {
        alert("Inserisci i tuoi obiettivi");
        return false;
    }

    var checkbox = document.coach_form.dichiarazione;
    if (!checkbox.checked) {
        alert("Per proseguire accetta le condizioni");
        return false;
    }
    var card = document.coach_form.card.value;
    var data_scadenza = document.coach_form.data_scadenza.value;
    var cvc = document.coach_form.cvc.value;
    if (card == '' || data_scadenza == '' || cvc == '') {
        alert("Inserire un metodo di pagamento valido");
        return false;
    }

    alert("Richiesta completata\nVerrai ricontattato entro 48h");
    return true;
}

function validaForm_articolo() {

    var titolo = document.form_articolo.titolo.value;
    if (titolo == '') {
        alert("Inserire un titolo");
        return false;
    }

    var intro = document.form_articolo.intro.value;
    if (intro == "") {
        alert("Si inseririsca una breve introduzione");
        return false;
    }

    var imgArticolo = document.getElementById("imgArticolo");
    if (imgArticolo.files.length === 0) {
        alert("Si prega di selezionare un'immagine");
        return false;
    }

    var txtArticolo = document.getElementById("txtArticolo");
    if (txtArticolo.files.length === 0) {
        alert("Si prega di selezionare un file di testo");
        return false;
    }

    return true;
}

function getWeather() {
    const apiKey = '33fb839cf219a184fd28f9d2c4feb350';     //chiave API ottenuta da OpenWeather
    const city = document.getElementById('city').value;

    if (!city) {
        alert('Inserire prima il nome di una località');
        return;
    }

    const currentWeatherUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`;
    const forecastUrl = `https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=${apiKey}`;

    fetch(currentWeatherUrl)
        .then(response => response.json())
        .then(data => {
            displayWeather(data);
        })
        .catch(error => {
            console.error('Error fetching current weather data:', error);
            alert('Errore caricamento meteo. Si prega di riprovare.');
        });

    fetch(forecastUrl)
        .then(response => response.json())
        .then(data => {
            displayHourlyForecast(data.list);
        })
        .catch(error => {
            console.error('Error fetching hourly forecast data:', error);
            alert('Errore caricamento previsioni meteo. Si prega di riprovare.');
        });
}

function displayWeather(data) {
    const tempDivInfo = document.getElementById('temp-div');
    const weatherInfoDiv = document.getElementById('weather-info');
    const weatherIcon = document.getElementById('weather-icon');
    const hourlyForecastDiv = document.getElementById('hourly-forecast');
    const h4_secmeteo = document.getElementById('h4_secmeteo');
    const text_secmeteo = document.getElementById('text_secmeteo');

    // Clear previous content
    weatherInfoDiv.innerHTML = '';
    hourlyForecastDiv.innerHTML = '';
    tempDivInfo.innerHTML = '';
    h4_secmeteo.innerHTML = '';
    text_secmeteo.innerHTML = '';

    if (data.cod === '404') {
        weatherInfoDiv.innerHTML = `<p>${data.message}</p>`;
    } else {
        const cityName = data.name;
        const temperature = Math.round(data.main.temp - 273.15); // Convert to Celsius
        const description = data.weather[0].description;
        const iconCode = data.weather[0].icon;
        const iconUrl = `https://openweathermap.org/img/wn/${iconCode}@4x.png`;

        const temperatureHTML = `
            <p>${temperature}°C</p>
        `;

        const weatherHtml = `
            <p>${cityName}</p>
            <p>${description}</p>
        `;

        tempDivInfo.innerHTML = temperatureHTML;
        weatherInfoDiv.innerHTML = weatherHtml;
        weatherIcon.src = iconUrl;
        weatherIcon.alt = description;

        showImage();
    }
}

function displayHourlyForecast(hourlyData) {
    const hourlyForecastDiv = document.getElementById('hourly-forecast');

    const next24Hours = hourlyData.slice(0, 5); // Display the next 24 hours (3-hour intervals)

    next24Hours.forEach(item => {
        const dateTime = new Date(item.dt * 1000); // Convert timestamp to milliseconds
        const hour = dateTime.getHours();
        const temperature = Math.round(item.main.temp - 273,15); // Convert to Celsius
        const iconCode = item.weather[0].icon;
        const iconUrl = `https://openweathermap.org/img/wn/${iconCode}.png`;

        const hourlyItemHtml = `
            <div class="hourly-item">
                <span>${hour}:00</span>
                <img src="${iconUrl}" alt="Hourly Weather Icon">
                <span>${temperature}°C</span>
            </div>
        `;

        hourlyForecastDiv.innerHTML += hourlyItemHtml;
});
}

function showImage() {
    const weatherIcon = document.getElementById('weather-icon');
    weatherIcon.style.display = 'block'; // Make the image visible once it's loaded
}

function validaForm_recupera() {
    var email = document.recuperapsw_form.email.value;
    if (email == "") {
        alert("Inserisci indirizzo email")
        return false;
    }
    return true;
}

function validaForm_cambiopsw() {
    var nuovapsw = document.cambiopsw_form.nuovapsw.value;
    var confermapsw = document.cambiopsw_form.confermapsw.value;
    if (nuovapsw != confermapsw) {
        alert("Le password non coincidono");
        return false;
    }

    var vecchiapsw = document.cambiopsw_form.vecchiapsw.value;

    $.ajax({
            url: 'cambio_psw.php', 
            method: 'POST', 
            data: { vecchiapsw: vecchiapsw, nuovapsw: nuovapsw}, 
            success: function(response) {
                if (response == 'false') {
                    alert("La password corrente inserita non è corretta");
                    return false;
                }
                else if (response == 'true') {
                    //alert("Cambio password eseguito con successo")
                    location.reload();
                } 
            }
        });
    return true;
}

function gestisciAltro() {
    var altroCheckbox = document.getElementById("Checkbox5");
    var altroInput = document.getElementById("Checkbox5input");

    if (altroCheckbox.checked) {
        altroInput.disabled = false; 
    } else {
        altroInput.disabled = true; 
        altroInput.value = ""; 
    }
}
function validaForm_infopt() {
    console.log(document.getElementById("Checkbox5").checked);
    console.log(document.getElementById("Checkbox5input").value);

    if (document.getElementById("Checkbox5").checked && document.getElementById("Checkbox5input").value == "") {
        alert("Si prega di inserire ulteriori dettagli nel campo \"Altro\" per specificare la tua specializzazione");
        return false;
    } 
    return true;
}
