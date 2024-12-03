console.log('JS loaded!');

const sectionVideo = document.querySelector('section.videos');
const sectionImages = document.querySelector('section.images');

const menuImage = document.getElementById('images');
const menuVideo = document.getElementById('videos');

menuImage.addEventListener('click', () => {
  sectionVideo.classList.add('cacher');
  sectionImages.classList.remove('cacher');
});

menuVideo.addEventListener('click', () => {
  sectionVideo.classList.remove('cacher');
  sectionImages.classList.add('cacher');
});

function esImage(i) {
  const regex = /(.jpg|.jpeg)$/;
  return regex.test(i);
}

const url3 = 'https://abourmau.lpmiaw.univ-lr.fr/2023/miaw/man-js/';
fetch(url3)
  .then((response) => {
    return response.json();
  })
  .then((data) => {
    //console.log(data);

    //constantes
    const aside = document.querySelector('aside');
    //const figure = document.querySelector('.figure');

    //compteur d'images
    let cptImage = 0;

    // tableau d'image
    const tabI = [];
    const tabImages = [];

    data.images.forEach((element) => {
      // vidéos
      if (esImage(element.large_url) === false) {
        const video = document.createElement('video');
        video.setAttribute('controls', '');

        video.setAttribute('src', element.large_url);
        aside.appendChild(video);

        // images
      } else {
        const figure = document.createElement('figure');
        const 
        .add('figure');
        figcaption.classList.add('cacher');

        figcaption.textContent = element.large_url.split('/')[7];

        sectionImages.appendChild(figure);

        const image = document.createElement('img');
        image.setAttribute('src', element.large_url);
        image.classList.add('cacher');
        figure.appendChild(image);
        figure.appendChild(figcaption);

        tabImages.push(image);

        cptImage += 1;

        if (element === data.images[0]) {
          figcaption.classList.remove('cacher');
          image.classList.remove('cacher');
        }
      }
    });

    for (let i = 0; i < cptImage; i += 1) {
      const ulMenuImg = document.querySelector('.ulMenuImages');
      const li = document.createElement('li');
      const i2 = document.createElement('i');
      i2.classList.add('fa');
      i2.classList.add('fa-circle');

      li.appendChild(i2);
      ulMenuImg.appendChild(li);
    }
  });
