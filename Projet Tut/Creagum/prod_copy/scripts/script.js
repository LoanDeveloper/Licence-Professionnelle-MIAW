console.log("JS loaded!");

document.addEventListener('DOMContentLoaded', () => {
  const menuLinks = document.querySelectorAll('.menu__items a');

  menuLinks.forEach(link => {
    link.addEventListener('click', () => {
      const checkbox = document.getElementById('icone-burger-close');
      checkbox.checked = false;
    });
  });
});

// Ajout de la class au click du bouton
/*
const formInscription = document.querySelector('.form-events');

const boutonInscription = document.querySelector('.recolte_event__button')

document.addEventListener('click', () => {
  formInscription.classList.add('activeForm');
  formInscription.classList.remove('form-events');
  console.log('Bouton cliqué !')
})*/
