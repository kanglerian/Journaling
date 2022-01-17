<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-leaf"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Journal <sup>Mental Health</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Request::segment(1) == 'dashboard') active @endif">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-pencil-alt"></i>
            <span>Journaling</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Ibadah
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if(Request::segment(1) == 'ngaos' or 'lihat') active @endif">
        <a class="nav-link" href="{{ route('ngaos.index') }}">
            <i class="fas fa-quran"></i>
            <span>Ngaos Qur'an</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-pray"></i>
            <span>Shalat</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-coins"></i>
            <span>Sedekah</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2">"<strong>Journaling</strong> adalah menuangkan seluruh pikiran dan perasaan kamu ke dalam bentuk tulisan supaya kamu bisa memahaminya secara lebih jelas."</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Front Page</a>
    </div> --}}

</ul>
<!-- End of Sidebar -->
