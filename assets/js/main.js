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