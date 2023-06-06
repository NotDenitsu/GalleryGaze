const searchLink = document.querySelector('.navigation__link:first-of-type');
const searchBar = document.querySelector('.navigation__search-bar');
const filterButton = document.querySelector('#filter');
const filterMenu = document.querySelector('.navigation__filters');


searchLink.addEventListener('click', () => {
    searchBar.classList.toggle('hidden');
    if(searchBar.classList.contains('hidden')  && !filterMenu.classList.contains('hidden')){
      filterMenu.classList.toggle('hidden');
    }
});


filterButton.addEventListener('click', () => {
  filterMenu.classList.toggle('hidden');
});