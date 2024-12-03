console.log('Javascript loaded!');

const data = {
  window: { title: 'Sample Widget', width: 500, height: 500 },
  image: { src: 'images/logo.png', coords: [250, 150, 350, 400] },
  messages: [
    { text: 'Save', offset: [10, 30] },
    { text: 'Quit', offset: [30, 10] },
  ],
};

console.log(data.window.title);
console.log(data.image.coords[2]);
console.log(data.messages.length);
console.log(data.messages[data.messages.length - 1].offset[1]);

/*const menu = {
  // @ts-ignore
  [
    // @ts-ignore
    {
      titre: 'Acceuil',
      lien: 'index.html',
    },
    {
      titre: 'Produits',
      sousMenu: [
        {
          titre: 'Produit 1',
          lien: 'produit1.html',
        },
        {
          titre: 'Produit 2',
          lien: 'produit2.html'
        }
      ]
    },
    {
      titre: 'Contact',
      lien: 'contact.html',
    }
  ]
};*/

const url = 'http://localhost:3000/personne';
fetch(url)
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data);

    const h2 = document.querySelector('h2.nom');
    h2.textContent = data[0].nom;

    const p = document.querySelector('p.adresse');
    p.textContent =
      'adresse : ' + data[0].adresse.cp + ' - ' + data[0].adresse.ville;

    const notes = document.querySelector('ul.notes');
    data[0].notes.forEach((element) => {
      const li = document.createElement('li');
      li.textContent = element;
      notes.appendChild(li);
    });
  });

// Exercice 4

const url2 = 'https://jsonplaceholder.typicode.com/todos';
fetch(url2)
  .then((response) => {
    if (!response.ok) {
      throw new Error('probleme avec le fetch');
    }
    return response.json();
  })
  .then((data) => {
    console.log(data);
    const ulCompleted = document.querySelector('ul.completedTask');
    const ulIncomplete = document.querySelector('ul.incompleteTask');

    data.forEach((element) => {
      if (element.completed == false) {
        const li = document.createElement('li');
        li.textContent = element.title;
        ulIncomplete.appendChild(li);
      } else {
        const li = document.createElement('li');
        li.textContent = element.title;
        ulCompleted.appendChild(li);
      }
    });
  });
