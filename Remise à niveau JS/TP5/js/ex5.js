console.log('JS loaded');

// Exercice 5

const titleWeather = document.querySelector('h2.titre');
const lieu = document.querySelector('h2.lieu');
const temperature = document.querySelector('p.temperature');
const date = document.querySelector('p.date');
const temps = document.querySelector('p.temps');

const windValue = document.querySelector('.windValue');
const cloudinessValue = document.querySelector('.cloudinessValue');
const pressureValue = document.querySelector('.pressureValue');
const humidityValue = document.querySelector('.humidityValue');
const sunriseValue = document.querySelector('.sunriseValue');
const sunsetValue = document.querySelector('.sunsetValue');
const geoCoordsValue = document.querySelector('.geoCoordsValue');

const url3 =
  'http://api.openweathermap.org/data/2.5/weather?q=La%20Rochelle&appid=15e015271350a719dfe2956bd9f398ed';
fetch(url3)
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);

    titleWeather.textContent = 'Weather in ' + data.name;
    lieu.textContent = data.sys.country;
    temperature.textContent = data.main.temp - 273.15 + ' °C';
    temps.textContent = data.weather[0].main;
    date.textContent = new Date(data.dt * 1000).toLocaleString();

    windValue.textContent = data.wind.speed;
    cloudinessValue.textContent = data.weather[0].description;
    pressureValue.textContent = data.main.pressure;
    humidityValue.textContent = data.main.humidity;
    sunriseValue.textContent = new Date(
      data.sys.sunrise * 1000
    ).toLocaleString();
    sunsetValue.textContent = new Date(data.sys.sunset * 1000).toLocaleString();
    geoCoordsValue.textContent = `[${data.coord.lon}, ${data.coord.lat}]`;
  });
