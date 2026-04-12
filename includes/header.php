<header class="header-area">
    <!-- Navbar -->
    <div class="delicious-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <nav class="classy-navbar justify-content-between" id="deliciousNav">
                    <a class="nav-brand" href="index.php">FOOD Recipes</a>

                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <div class="classy-menu">
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <div class="classynav">
                            <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
                            <ul>
                                <li class="<?php if($currentPage == 'index.php') echo 'active';?>"><a href="index.php">Home</a></li>
                                <li class="<?php if($currentPage == 'about.php') echo 'active';?>"><a href="about.php">About Us</a></li>
                                <li class="<?php if(in_array($currentPage, ['recipes.php', 'recipe-details.php', 'search.php'])) echo 'active';?>"><a href="recipes.php">Recipes</a></li>
                                <li><a href="user/login.php">Users</a></li>
                                <li><a href="admin/login.php">Admin</a></li>
                                <li class="<?php if($currentPage == 'contact.php') echo 'active';?>"><a href="contact.php">Contact</a></li>
                            </ul>

                            <div class="search-btn">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>