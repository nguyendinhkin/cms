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
        <a class="navbar-brand" href="/admin">CMS Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a target="_blank" href="/">HOME PAGE</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="/admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="post" class="collapse">
                    <li>
                        <a href="/admin/posts">View all posts</a>
                    </li>
                    <li>
                        <a href="/admin/add-post">Add post</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/admin/category"><i class="fa fa-fw fa-table"></i> Categories</a>
            </li>
            <li>
                <a href="/admin/comment"><i class="fa fa-fw fa-bar-chart-o"></i> Comments</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#user_dropdown"><i class="fa fa-fw fa-edit"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="user_dropdown" class="collapse">
                    <li>
                        <a href="/admin/user">View all users</a>
                    </li>
                    <li>
                        <a href="/admin/users/add">Add user</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>