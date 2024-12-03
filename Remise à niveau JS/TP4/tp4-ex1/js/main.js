const h1 = document.querySelector('h1');

console.log(h1);

const card = document.getElementsByClassName('pcard');

console.log(card.length);

const premierePersonne = card[0].querySelector('h2');
premierePersonne.textContent = 'test';

const deuxiemeCard = card[1];
deuxiemeCard.classList.add('cacher');

const boutonReapparait = document.querySelector('p.regenerer');

boutonReapparait.addEventListener('click', () => {
  deuxiemeCard.classList.remove('cacher');
});

const boutonX = document.querySelectorAll('.pcard__suppression');

boutonX.forEach((element) => {
  element.addEventListener('click', (x) => {
    element.parentElement.classList.add('cacher');
  });
});

const cards = document.querySelectorAll('article.pcard');

const boutonAllApparait = document.querySelector('p.regenerer2');
boutonAllApparait.addEventListener('click', () => {
  cards.forEach((element) => {
    element.classList.remove('cacher');
  });
});

const setOfCard = document.querySelector('.set-of-pcard');

function addCard() {
  const newCard = document.querySelectorAll('.pcard')[0].cloneNode(true);
  setOfCard.appendChild(newCard);
}

document.querySelector('.addCard').addEventListener('click', addCard);

const boutonAddTimer = document.querySelector('p.addTimer');

boutonAddTimer.addEventListener('click', () => {
  let timer = window.setInterval(addCard, 10000);

  const stopTimer = document.querySelector('p.stopTimer');
  stopTimer.addEventListener('click', () => {
    window.clearInterval(timer);
  });
});

const titreFormulaire = document.querySelector('.formulaire h2');
const p = document.createElement('p');
p.textContent = 'Remplissez les champs pour créer une nouvelle car';

titreFormulaire.parentElement.appendChild(p);

cards.forEach((element) => {
  element.addEventListener('click', () => {
    element.classList.toggle('pcard--reduit');
  });
});

const boutonForm = document.getElementById('ajouterCarteForm');
boutonForm?.addEventListener('click', () => {
  const nomCarte = document.getElementById('nomCarte').value;
  const fonctionCarte = document.getElementById('fonctionCarte').value;
  const imageCarte = document.querySelector('#imageCarte').value;

  const jpgRegex = /.+.jpg/;
  if (!jpgRegex.test(imageCarte)) {
    alert('Veuillez saisir une image au format jpg.');
    return;
  }

  const nouvelleCarte = document.createElement('article');
  nouvelleCarte.className = 'pcard pcard--reduit';

  nouvelleCarte.innerHTML = `
      <div class="pcard__suppression">x</div>
        <header class="pcard__header">
            <div class="pcard__cadre-portrait">
                <img class="pcard__portrait" src="assets/img/${imageCarte}" alt="${nomCarte}">
            </div>
            <h2 class="pcard__nom">${nomCarte}</h2>
            <h3 class="pcard__fonction">${fonctionCarte}</h3>
        </header>
        <section class="pcard__main">
            <a href="#" class="pcard__more">Voir +</a>
        </section>
        <footer class="pcard__footer">
            <div class="pcard__resultat">
                <div class="pcard__score">Satisfaction</div>
            </div>
            <div class="pcard__resultat">
                <div class="pcard__score">Occupation</div>
            </div>
        </footer>
        `;

  const setOfPcard = document.querySelector('.set-of-pcard');
  setOfPcard.appendChild(nouvelleCarte);

  ajouterCarteForm.reset();
});
