<nav class="navigation">
    <div class="navigation__container-query">
        <div class="navigation__container-search hidden">
            <div class="navigation__container-field">
                <input class="navigation__search-field" type="text" placeholder="Search...">
                <button class="navigation__button-search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <button id="filters-button" class="navigation__button-filters"><i class="fa-solid fa-filter"></i></button>
        </div>
        <div class="navigation__container-filters hidden">
            <div class="navigation__container-sort">
                <h3>Sort By</h3>
                <div class="navigation__container-options">
                    <label class="navigation__sort-option">
                        <input type="radio" name="sort_by" value="date-newest"> Upload Date -Newest
                    </label>
                    <label class="navigation__sort-option">
                        <input type="radio" name="sort_by" value="date-oldest"> Upload Date - Oldest
                    </label>
                    <label class="navigation__sort-option">
                        <input type="radio" name="sort_by" value="likes-most"> Most Liked
                    </label>
                    <label class="navigation__sort-option">
                        <input type="radio" name="sort_by" value="likes-least">Least Liked
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation__container-list">
        <ul class="navigation__list">
            <li class="navigation__item">
                <a href="#" class="navigation__link"><i class="fas fa-search"></i></a>
            </li>
            <li class="navigation__item">
                <a href="#" class="navigation__link"><i class="fas fa-home"></i><span
                        class="navigation__text">Home</span></a>
                <span class="navigation__tooltip">Home</span>
            </li>
            <li class="navigation__item">
                <a href="#" class="navigation__link"><i class="fas fa-user"></i><span
                        class="navigation__text">Profile</span></a>
                <span class="navigation__tooltip">Profile</span>
            </li>
            <li class="navigation__item">
                <a href="#" class="navigation__link"><i class="fas fa-tachometer-alt"></i><span
                        class="navigation__text">Dashboard</span></a>
                <span class="navigation__tooltip">Dashboard</span>
            </li>
            <li class="navigation__item">
                <a href="#" class="navigation__link"><i class="fas fa-envelope"></i><span
                        class="navigation__text">Messages</span></a>
                <span class="navigation__tooltip">Messages</span>
            </li>
            <li class="navigation__item">
                <a href="#" class="navigation__link"><i class="fas fa-heart"></i><span
                        class="navigation__text">Favourites</span></a>
                <span class="navigation__tooltip">Favourites</span>
            </li>
            <li class="navigation__item">
                <a href="#" class="navigation__link"><i class="fas fa-upload"></i><span
                        class="navigation__text">Upload</span></a>
                <span class="navigation__tooltip">Upload</span>
            </li>
            <li class="navigation__item">
                <a href="#" class="navigation__link"><i class="fas fa-cog"></i><span
                        class="navigation__text">Settings</span></a>
                <span class="navigation__tooltip">Settings</span>
            </li>
            <li class="navigation__item">
                <a href="#" class="navigation__link"><i class="fas fa-right-from-bracket"></i><span
                        class="navigation__text">Log Out</span></a>
                <span class="navigation__tooltip">Log Out</span>
            </li>
            <li class="navigation__item">
                <a href="#" class="navigation__link"><i class="fas fa-info-circle"></i><span
                        class="navigation__text">Info</span></a>
                <span class="navigation__tooltip">Info</span>
            </li>
        </ul>
    </div>
    <button class="navigation__button-bars"><i class="fas fa-bars"></i></button>
</nav>