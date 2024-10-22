<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="<?= base_url($this->session->level) ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/damri.png') ?>" alt="Logo Damri" width="40">
        </div>
        <div class="sidebar-brand-text mx-3">DAMRI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    {items}
    <!-- Heading -->
    <div class="sidebar-heading">
        {heading}
    </div>

    {nav-item}
    <li class="nav-item {active}">
        <a class="nav-link" href="<?= base_url() ?>{href}">
            <i class="{icon}"></i>
            <span>{label}</span>
        </a>
    </li>
    {/nav-item}

    <!-- Divider -->
    <hr class="sidebar-divider">
    {/items}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->