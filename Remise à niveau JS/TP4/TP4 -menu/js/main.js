console.log('JS loaded!');

const ouverture = document.getElementById('ouverture_menu');
const fermeture = document.getElementById('fermeture_menu');
const menu = document.getElementById('menu');

ouverture.addEventListener('click', () => {
  menu.classList.add('ouvert');
});

fermeture.addEventListener('click', () => {
  menu.classList.remove('ouvert');
});
