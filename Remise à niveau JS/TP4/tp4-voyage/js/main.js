console.log('JS loaded!');
let count = 0;

const affichageFavoris = document.querySelector('.phrase-nb-favoris');
affichageFavoris.innerHTML = count;

function countAffichageFavoris() {
  const allFavoris = document.querySelectorAll('.voyage--favori');
  count = allFavoris.length;
  affichageFavoris.innerHTML = count;
}

const voyages = document.querySelectorAll('.voyage');
voyages.forEach((element) => {
  element.addEventListener('click', () => {
    element.classList.remove('voyage--favori');
    console.log(element.querySelector('h3').textContent);
    console.log(element.getAttribute('data-reference'));
    countAffichageFavoris();
  });
});

const etoiles = document.querySelectorAll('.voyage__etoile');
etoiles.forEach((element) => {
  element.addEventListener('click', (event) => {
    event.stopPropagation();
    element.parentElement.classList.add('voyage--favori');
    countAffichageFavoris();
  });
});

const boutonVider = document.querySelector('button.vider');
boutonVider.addEventListener('click', () => {
  voyages.forEach((element) => {
    element.classList.remove('voyage--favori');
    countAffichageFavoris();
  });
});
