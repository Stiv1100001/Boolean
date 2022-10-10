const items = ['img/01.jpg', 'img/02.jpg', 'img/03.jpg', 'img/04.jpg', 'img/05.jpg'];

const title = ['Svezia', 'Svizzera', 'Gran Bretagna', 'Germania', 'Paradise'];

const text = [
  'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et temporibus voluptatum suscipit tempore aliquid deleniti aut veniam inventore eligendi ex ad ullam, cumque provident totam omnis, magnam dolores dolorum corporis.',
  'Lorem ipsum',
  'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
  'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et temporibus voluptatum suscipit tempore aliquid deleniti aut veniam inventore eligendi ex ad ullam,',
  'Et temporibus voluptatum suscipit tempore aliquid deleniti aut veniam inventore eligendi ex ad ullam,',
];

const mainImg = document.getElementById('main-img');
const titleDOM = document.getElementById('title');
const textDOM = document.getElementById('text');
const carousel = document.getElementById('carousel');

let currentIndex = 0;

// Initialize page
for (let i = 0; i < items.length; i++) {
  if (i === 0) {
    mainImg.src = items[i];
    titleDOM.innerHTML = title[i];
    textDOM.innerHTML = text[i];
  }
  const newImgCarousel = document.createElement('img');
  newImgCarousel.src = items[i];
  newImgCarousel.alt = 'Sample Img';
  newImgCarousel.classList.add('carousel-img', 'w-100');
  if (i === 0) newImgCarousel.classList.add('img-thumbnail');
  carousel.appendChild(newImgCarousel);
}

/* Listener */
document.getElementById('arrow-down').addEventListener('click', () => {
  const imgs = document.querySelectorAll('.carousel-img');

  for (let i = 0; i < imgs.length; i++) {
    imgs[i].classList.remove('img-thumbnail');
  }

  currentIndex++;

  if (currentIndex === imgs.length) currentIndex = 0;

  mainImg.src = items[currentIndex];
  imgs[currentIndex].classList.add('img-thumbnail');
  titleDOM.innerHTML = title[currentIndex];
  textDOM.innerHTML = text[currentIndex];
});

document.getElementById('arrow-up').addEventListener('click', () => {
  const imgs = document.querySelectorAll('.carousel-img');

  for (let i = 0; i < imgs.length; i++) {
    imgs[i].classList.remove('img-thumbnail');
  }

  currentIndex--;

  if (currentIndex < 0) currentIndex = imgs.length - 1;

  mainImg.src = items[currentIndex];
  imgs[currentIndex].classList.add('img-thumbnail');
  titleDOM.innerHTML = title[currentIndex];
  textDOM.innerHTML = text[currentIndex];
});
