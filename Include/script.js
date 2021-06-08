const burger = document.querySelector('.burger');
const navitems = document.querySelector('.nav-items');
const items = document.querySelector('.nav-items li');


burger.addEventListener('click', () => {
  navitems.classList.toggle('open');
});
