<?php $adminCurrentPage = basename($_SERVER['PHP_SELF']); ?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="<?php if($adminCurrentPage == 'dashboard.php') echo 'active';?>" href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="<?php if($adminCurrentPage == 'reg-users.php') echo 'active';?>" href="reg-users.php">
                        <i class="fa fa-users"></i>
                        <span>Registered Users</span>
                    </a>
                </li>
                <li>
                    <a class="<?php if(in_array($adminCurrentPage, ['listed-recipes.php','edit-recipe.php','user-recipes.php'])) echo 'active';?>" href="listed-recipes.php">
                        <i class="fa fa-cutlery"></i>
                        <span>Listed Recipes</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-comment"></i>
                        <span>Comments</span>
                    </a>
                    <ul class="sub">
                        <li><a class="<?php if($adminCurrentPage == 'new-comments.php') echo 'active';?>" href="new-comments.php">New</a></li>
                        <li><a class="<?php if($adminCurrentPage == 'approved-comments.php') echo 'active';?>" href="approved-comments.php">Approved</a></li>
                        <li><a class="<?php if($adminCurrentPage == 'rejected-comments.php') echo 'active';?>" href="rejected-comments.php">Rejected</a></li>
                        <li><a class="<?php if($adminCurrentPage == 'all-comments.php') echo 'active';?>" href="all-comments.php">All</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bullhorn"></i>
                        <span>Enquiry</span>
                    </a>
                    <ul class="sub">
                        <li><a class="<?php if($adminCurrentPage == 'unreadenq.php') echo 'active';?>" href="unreadenq.php">Unread</a></li>
                        <li><a class="<?php if($adminCurrentPage == 'readenq.php') echo 'active';?>" href="readenq.php">Read</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-file-text"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="sub">
                        <li><a class="<?php if($adminCurrentPage == 'about-us.php') echo 'active';?>" href="about-us.php">About Us</a></li>
                        <li><a class="<?php if($adminCurrentPage == 'contact-us.php') echo 'active';?>" href="contact-us.php">Contact Us</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bar-chart"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub">
                        <li><a class="<?php if($adminCurrentPage == 'report-reg-users.php') echo 'active';?>" href="report-reg-users.php">Registered Users</a></li>
                        <li><a class="<?php if($adminCurrentPage == 'recipes-report.php') echo 'active';?>" href="recipes-report.php">Recipes</a></li>
                    </ul>
                </li>

                <li>
                    <a class="<?php if($adminCurrentPage == 'search.php') echo 'active';?>" href="search.php">
                        <i class="fa fa-search"></i>
                        <span>Search Recipes</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>