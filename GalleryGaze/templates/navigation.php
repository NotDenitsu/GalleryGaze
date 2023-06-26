<nav class="navigation">
    <form class="navigation__container-query" id="search-form" action="home.php" method="GET">
        <div class="navigation__container-search hidden">
            <div class="navigation__container-field">
                <input class="navigation__search-field" type="text" name="query" placeholder="Search...">
                <button class="navigation__button-search" type="submit"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <button id="filters-button" class="navigation__button-filters" type="button"><i class="fa-solid fa-filter"></i></button>
        </div>
        <div class="navigation__container-filters hidden">
            <div class="navigation__container-sort">
                <h3>Sort By</h3>
                <div class="navigation__container-options">
                    <label class="navigation__sort-option">
                        <input type="radio" name="sort_by" value="date-newest" checked> Upload Date - Newest
                    </label>
                    <label class="navigation__sort-option">
                        <input type="radio" name="sort_by" value="date-oldest"> Upload Date - Oldest
                    </label>
                    <label class="navigation__sort-option">
                        <input type="radio" name="sort_by" value="likes-most"> Most Liked
                    </label>
                    <label class="navigation__sort-option">
                        <input type="radio" name="sort_by" value="likes-least"> Least Liked
                    </label>
                </div>
            </div>
        </div>
    </form>

    <div class="navigation__container-list">
        <ul class="navigation__list">
            <li class="navigation__item <?php
            if (
                strpos($_SERVER['PHP_SELF'], 'home.php') === false
            ) {
                echo "hidden";
            }
            ?>">
                <a href="#" class="navigation__link"><i class="fas fa-search"></i></a>
            </li>
            <li class="navigation__item">
                <a href="home.php" class="navigation__link"><i class="fas fa-home"></i><span
                        class="navigation__text">Home</span></a>
                <span class="navigation__tooltip">Home</span>
            </li>
            <li class="navigation__item">
                <a href="profile.php?id=<?= @$_SESSION['user']['id'] ?>" class="navigation__link <?php if (!isset($_SESSION['user']))
                      echo "hidden" ?>"><i class="fas fa-user"></i><span class="navigation__text">Profile</span></a>
                    <span class="navigation__tooltip">Profile</span>
                </li>
                <li class="navigation__item">
                    <a href="#" class="navigation__link"><i class="fas fa-tachometer-alt"></i><span
                            class="navigation__text">Dashboard</span></a>
                    <span class="navigation__tooltip">Dashboard</span>
                </li>
                <li class="navigation__item">
                    <a href="favourites.php" class="navigation__link"><i class="fas fa-heart"></i><span
                            class="navigation__text">Favourites</span></a>
                    <span class="navigation__tooltip">Favourites</span>
                </li>
                <li class="navigation__item">
                    <a href="upload.php" class="navigation__link"><i class="fas fa-upload"></i><span
                            class="navigation__text">Upload</span></a>
                    <span class="navigation__tooltip">Upload</span>
                </li>
                <li class="navigation__item">
                    <a href="settings.php" class="navigation__link"><i class="fas fa-cog"></i><span
                            class="navigation__text">Settings</span></a>
                    <span class="navigation__tooltip">Settings</span>
                </li>
                <li class="navigation__item">
                    <a href="../backend/logout.php" class="navigation__link"><i class="fas fa-right-from-bracket"></i><span
                            class="navigation__text"><?php if (isset($_SESSION['user'])) {
                      echo "Log Out";
                  } else {
                      echo "Log In";
                  } ?></span></a>
                <span class="navigation__tooltip">
                    <?php if (isset($_SESSION['user'])) {
                        echo "Log Out";
                    } else {
                        echo "Log In";
                    } ?>
                </span>
            </li>
            <li class="navigation__item">
                <a href="information.php" class="navigation__link"><i class="fas fa-info-circle"></i><span
                        class="navigation__text">Info</span></a>
                <span class="navigation__tooltip">Info</span>
            </li>
        </ul>
    </div>
    <button class="navigation__button-bars"><i class="fas fa-bars"></i></button>
</nav>