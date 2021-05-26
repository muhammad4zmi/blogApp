<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <?php foreach ($profil as $k) : ?>
            <div class="sidebar-brand-icon">
                <i class="fas">
                    <img src="<?= base_url('/admin/img/logo') . '/' . $k['site_logo']; ?>" alt="" class="logo-side" width="40">
                </i>
            </div>


            <div class="sidebar-brand-text mx-3" style="font-size: 12px;"><?= $k['blog_name']; ?></div>
        <?php endforeach; ?>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <?php if (in_groups('admin')) : ?>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/dashboard/'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/profil/'); ?>">
                <i class="fas fa-fw fa-user-circle"></i>
                <span>Profil</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/profil/'); ?>">
                <i class="fas fa-fw fa-address-card"></i>
                <span>About</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/portofolio/'); ?>">
                <i class="fas fa-fw fa-project-diagram"></i>
                <span>Portofolio</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/category/'); ?>">
                <i class="fab fa-fw fa-blogger"></i>
                <span>Blogs Category</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/blog/'); ?>">
                <i class="fab fa-fw fa-blogger"></i>
                <span>Blogs</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->




    <?php endif; ?>

    <!-- Nav Item - Tables -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->