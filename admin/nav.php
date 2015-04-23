<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                    class="fa fa-user fa-2x"></i> <?php echo $_SESSION['user_name']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="account_settings.php"><i class="fa fa-fw fa-gear fa-2x"></i>Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-power-off fa-2x"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard fa-2x"></i> Dashboard</a>
            </li>
            <li>
                <a href="photo_manage.php"><i class="fa fa-fw fa-file-image-o fa-2x"></i> Photo Manager</a>
            </li>
            <li>
                <a href="gig_manage.php"><i class="fa fa-fw fa-headphones fa-2x"></i> Gig Manager</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>