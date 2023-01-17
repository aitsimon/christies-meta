<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./dashboard" class="brand-link">
        <img src="../../view/media/logos/logof4-3.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../repositories/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['email'] ?></a>
            </div>
        </div
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="./../../index.php/admin/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-gamepad "></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./../../index.php/admin/dashboard/categories" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./../../index.php/admin/dashboard/users" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <!--                <i class="fas fa-angle-left right"></i>-->
                            <!--                <span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./../../index.php/admin/dashboard/products" class="nav-link">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>
                            Products
                            <!--                <i class="fas fa-angle-left right"></i>-->
                            <!--                <span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./../../index.php/admin/dashboard/purchases" class="nav-link">
                        <i class="nav-icon fas fa-euro-sign"></i>
                        <p>
                            Purchases
                            <!--                <i class="fas fa-angle-left right"></i>-->
                            <!--                <span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./../../index.php/admin/dashboard/comments" class="nav-link">
                        <i class="nav-icon fas fa-comment   "></i>
                        <p>
                            Comments
                            <!--                <i class="fas fa-angle-left right"></i>-->
                            <!--                <span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./../../index.php/admin/dashboard/contact-forms" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Contact Forms
                            <!--                                <i class="fas fa-angle-left right"></i>-->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./../../index.php/admin/dashboard/logout" class="nav-link">
                        <i class="nav-icon fas fa-window-close"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
