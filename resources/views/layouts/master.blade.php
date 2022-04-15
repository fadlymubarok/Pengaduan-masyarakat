<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../assets/ruang-admin/img/logo/bg_A.png" rel="icon">
    <title>{{ $title }} - Mengadu</title>
    <link href="../../assets/ruang-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/ruang-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/ruang-admin/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon">
                    <img src="../../assets/ruang-admin/img/logo/bg_A.png">
                </div>
                <div class="sidebar-brand-text mx-3">Mengadu</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ Request()->is('/') ? 'active' : ''}}">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>
            @if(!auth()->user() || auth()->user()->level == 'masyarakat')
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                For you
            </div>
            <li class="nav-item {{ Request()->is('pengaduan*') ? 'active' : ''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Pengaduan</span>
                </a>
                <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/pengaduan">Pengaduan Anda</a>
                        <a class="collapse-item" href="/pengaduan/create">Ajukan Pengaduan</a>
                    </div>
                </div>
            </li>
            @endif
            @can('spesial')
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Petugas
            </div>
            @can('admin')
            <li class="nav-item {{ Request()->is('data-user*') ? 'active' : ''}}">
                <a class="nav-link" href="/data-user">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Akun</span>
                </a>
            </li>
            @endcan
            <li class="nav-item {{ Request()->is('laporan*') ? 'active' : ''}}">
                <a class="nav-link" href="/laporan">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Laporan Masyarakat</span>
                </a>
            </li>
            @endcan
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                @yield('topbar')
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    @yield('container-fluid')
                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy; 2022 - Fadly Mubarok Nasution</span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="../../assets/ruang-admin/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/ruang-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/ruang-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../assets/ruang-admin/js/ruang-admin.min.js"></script>
    <script src="../../assets/ruang-admin/vendor/chart.js/Chart.min.js"></script>
    <script src="../../assets/ruang-admin/js/demo/chart-area-demo.js"></script>
</body>

</html>