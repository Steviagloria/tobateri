<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <p class="nav-link m-0 text-muted font-weight-bold"><?= $navTitle; ?></p>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item">
            <p class="nav-link">
                Dashboard
            </p>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('logout'); ?>">
                Logout
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->