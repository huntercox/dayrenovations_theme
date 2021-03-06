window.onload = function () {

  const hamburger = document.querySelector('.hamburger');
  const nav = document.querySelector('#navMenu');

  if (hamburger) {
    hamburger.addEventListener('click', function (event) {
      hamburger.classList.toggle('is-active');
      nav.classList.toggle('showNav');
    }, false);
  }

}

// Splide.JS
document.addEventListener('DOMContentLoaded', function () {
  new Splide('.splide', {
    perPage: 1,
    arrows: false,
    cover: true,
    width: '100vw',
  }).mount();
});