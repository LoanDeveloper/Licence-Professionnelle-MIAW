console.log('JS loaded');

const apiUrl = 'https://en.wikipedia.org/w/api.php';
const searchTerm = 'Nelson Mandela';

// Utilisation de cors-anywhere comme proxy pour contourner les problèmes CORS
const proxyUrl = 'https://cors-anywhere.herokuapp.com/';

const params = new URLSearchParams({
  action: 'query',
  list: 'search',
  srsearch: searchTerm,
  format: 'json',
  origin: '*',
});

fetch(`${proxyUrl}${apiUrl}?${params}`)
  .then((response) => response.json())
  .then((data) => {
    if (data.query.search[0].title === searchTerm) {
      console.log(
        `Your search page '${searchTerm}' exists on English Wikipedia`
      );
    }
  });
