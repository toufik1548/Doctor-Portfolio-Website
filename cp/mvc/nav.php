<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $cp_url; ?>">
            <img src="<?php echo $site_url; ?>/images/logo1.png" width="160" alt="LOGO">
        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo $cp_url; ?>/changepassword/"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo $cp_url; ?>/logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> POSTS<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-1" class="collapse">
                    <li><a href="<?php echo $cp_url; ?>/add-post/"><i class="fa fa-angle-double-right"></i> Add Post </a></li>
                    <li><a href="<?php echo $cp_url; ?>/post-list/"><i class="fa fa-angle-double-right"></i> Post List </a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  VIDEOS<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-2" class="collapse">
                    <li><a href="<?php echo $cp_url; ?>/add-video/"><i class="fa fa-angle-double-right"></i> Add Video </a></li>
                    <li><a href="<?php echo $cp_url; ?>/video-list/"><i class="fa fa-angle-double-right"></i> Video List</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo $cp_url; ?>/appointments/"><i class="fa fa-fw fa-user-plus"></i>  Appointments</a>
            </li>
            <li>
                <a href="<?php echo $cp_url; ?>/timetable/"><i class="fa fa-fw fa-paper-plane-o"></i> Timetable</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>