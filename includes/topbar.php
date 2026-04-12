    <!-- Preloader -->
    <div id="preloader">
        <i class="circle-preloader"></i>
        <img src="img/core-img/salad.png" alt="">
    </div>

    <!-- Search Overlay -->
    <div class="search-overlay" id="searchOverlay">
        <div class="search-overlay-close" id="searchClose">
            <span></span>
            <span></span>
        </div>
        <div class="search-overlay-inner">
            <h3>What are you looking for?</h3>
            <form action="search.php" method="post" class="search-overlay-form">
                <div class="search-input-wrap">
                    <input type="search" name="search" placeholder="Search recipes..." required autocomplete="off" id="searchInput">
                    <button type="submit"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </div>
                <p class="search-hint">Try: Pasta, Curry, Bread, Salad...</p>
            </form>
        </div>
    </div>