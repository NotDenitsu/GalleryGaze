document.addEventListener('DOMContentLoaded', () => {
    const searchLink = document.querySelector('.navigation__item:first-of-type');
    const searchBar = document.querySelector('.navigation__container-search');
    const filterButton = document.querySelector('#filters-button');
    const filterMenu = document.querySelector('.navigation__container-filters');
    const dropdownButton = document.querySelector('.navigation__button-bars');
    const navigationMenu = document.querySelector('.navigation__container-list');
    
    var searchVisible = false;
  
    function toggleSearchBar() {
      if (window.innerWidth <= 768) return;
      searchBar.classList.toggle('hidden');
      if (searchBar.classList.contains('hidden') && !filterMenu.classList.contains('hidden')) {
        filterMenu.classList.toggle('hidden');
      }
    }
  
    function toggleFilterMenu() {
        filterMenu.classList.toggle('hidden');
        if (window.innerWidth <= 768) {
            if (!filterMenu.classList.contains('hidden') && !navigationMenu.classList.contains('hidden')) {
                navigationMenu.classList.toggle('hidden');
            }
        }
    }

    function toggleNavigationMenu() {
        navigationMenu.classList.toggle('hidden');
        if (window.innerWidth <= 768) {
            if (!navigationMenu.classList.contains('hidden') && !filterMenu.classList.contains('hidden')) {
                filterMenu.classList.toggle('hidden');
              }
        }
    }
  
    function checkResolution() {
      var windowWidth = window.innerWidth;
      var isMobileResolution = windowWidth <= 768;
  
      if (isMobileResolution) {
        searchBar.classList.remove('hidden');
        navigationMenu.classList.add('hidden');
      } else {
        searchBar.classList.add('hidden');
        navigationMenu.classList.remove('hidden');
        filterMenu.classList.add('hidden')
      }

    }
        
    searchLink.addEventListener('click', toggleSearchBar);
    filterButton.addEventListener('click', toggleFilterMenu);
    dropdownButton.addEventListener('click', toggleNavigationMenu);
  
    
  
    window.addEventListener('load', checkResolution);
    window.addEventListener('resize', checkResolution);
  });
  