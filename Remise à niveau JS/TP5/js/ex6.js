console.log('JS loaded!');

var map = L.map('map').setView([43.6043, 1.4437], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

const urlDefribrilateurs =
  'https://data.toulouse-metropole.fr/api/explore/v2.1/catalog/datasets/defibrillateurs/records?limit=20';

fetch(urlDefribrilateurs)
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);

    //L.marker([1.4393031008212565, 43.60204730566235]).addTo(map);

    data.results.forEach((element) => {
      //console.log(element.geo_point_2d.lon);
      L.marker([element.geo_point_2d.lat, element.geo_point_2d.lon]).addTo(map);
    });
  });
