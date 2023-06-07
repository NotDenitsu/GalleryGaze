<nav class="navigation">
        <ul class="navigation__list">
          <li class="navigation__item">
            <a href="#" class="navigation__link">
              <i class="fas fa-search navigation__icon"></i>
            </a>
            <div class="navigation__search-filter-container">
            <div class="navigation__search-bar hidden">
                <div class="navigation__search-container">
                    <input type="text" placeholder="Search...">
                    <button><i class="fa-solid fa-magnifying-glass navigation__icon"></i></button>
                </div>
                <button id="filter"><i class="fa-solid fa-filter navigation__icon"></i></button>
            </div>
            <div class="navigation__filters hidden">
              <h3>Filters</h3>
              <div class="navigation__filters-content" style="overflow:unset;">
                  <select name="sorting_options" id="sorting_options" class="dropdown">
                      <option value="">--Sorting options--</option>
                      <option value="dateAsc">Upload date newer</option>
                      <option value="dateDesc">Upload date older</option>
                      <option value="likesAsc">Most likes</option>
                      <option value="likesDesc">Least likes</option>
                  </select>
              </div>
          </div>
          <script src="../javascript/dropdown.js"></script>
          </div>
          </li>
          <li class="navigation__item">
            <a href="#" class="navigation__link">
              <i class="fas fa-home navigation__icon"></i>
            </a>
            <span class="navigation__tooltip"><span class="navigation__tooltip-text">Home</span></span>
          </li>
          <li class="navigation__item">
            <a href="#" class="navigation__link">
              <i class="fas fa-user navigation__icon"></i>
            </a>
            <span class="navigation__tooltip"><span class="navigation__tooltip-text">Profile</span></span>
          </li>
          <li class="navigation__item">
            <a href="#" class="navigation__link">
              <i class="fas fa-envelope navigation__icon"></i>
            </a>
            <span class="navigation__tooltip"><span class="navigation__tooltip-text">Messages</span></span>
          </li>
          <li class="navigation__item">
            <a href="#" class="navigation__link">
              <i class="fas fa-tachometer-alt navigation__icon"></i>
            </a>
            <span class="navigation__tooltip"><span class="navigation__tooltip-text">Dashboard</span></span>
          </li>
          <li class="navigation__item">
            <a href="#" class="navigation__link">
              <i class="fas fa-heart navigation__icon"></i>
            </a>
            <span class="navigation__tooltip"><span class="navigation__tooltip-text">Liked Posts</span></span>
          </li>
          <li class="navigation__item">
            <a href="#" class="navigation__link">
              <i class="fas fa-upload navigation__icon"></i>
            </a>
            <span class="navigation__tooltip"><span class="navigation__tooltip-text">Upload</span></span>
          </li>
          <li class="navigation__item">
            <a href="#" class="navigation__link">
              <i class="fas fa-cog navigation__icon"></i>
            </a>
            <span class="navigation__tooltip"><span class="navigation__tooltip-text">Settings</span></span>
          </li>
          <li class="navigation__item">
            <a href="#" class="navigation__link">
              <i class="fa-solid fa-right-from-bracket navigation__icon"></i>
            </a>
            <span class="navigation__tooltip"><span class="navigation__tooltip-text">Log Out</span></span>
          </li>
 
          <li class="navigation__item">
            <a href="#" class="navigation__link">
              <i class="fas fa-info-circle navigation__icon"></i>
            </a>
            <span class="navigation__tooltip"><span class="navigation__tooltip-text">Info</span></span>
          </li>
        </ul>
        
        <img class="navigation__logo" src="gglogo.svg" alt="Logo">
      </nav>