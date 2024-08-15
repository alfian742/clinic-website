<ul class="navbar-nav bg-gradient-accent sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <div class="bg-white custom-rounded-icon p-1">
                <img src="<?= base_url('assets/img/my-clinic.webp'); ?>" alt="My Clinic" height="32" width="32">
            </div>
        </div>
        <div class="sidebar-brand-text mx-3">My Clinic</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Master
    </div>

    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/master') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('master'); ?>">
            <i class="fas fa-fw fa-book-medical"></i>
            <span>Medical Records</span></a>
    </li>

    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/pasien' || $_SERVER['REQUEST_URI'] == '/tenaga-medis' || $_SERVER['REQUEST_URI'] == '/layanan') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Medical Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('pasien'); ?>">Patients Data</a>
                <a class="collapse-item" href="<?= base_url('tenaga-medis'); ?>">Medical Personnel Data</a>
                <a class="collapse-item" href="<?= base_url('layanan'); ?>">Medical Services</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Others
    </div>

    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/transaksi') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('transaksi'); ?>">
            <i class="fas fa-fw fa-money-check-dollar"></i>
            <span>Transaction</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>