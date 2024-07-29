<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  @yield('style-css')

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/dashboard" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="assets/img/logo-polos.png" alt="Profile" class="rounded-circle" width="40">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
        </a><!-- End Profile Image Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
          </li>
          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
              <span>Log Out</span></button>
            </form>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->
    </ul>

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ $active === 'dashboard' ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ $active === 'dropdown' ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#" class="active">
          <i class="bi bi-journal-text"></i><span>Formulir</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse {{ $active === 'dropdown' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('lombas.lomba') }}" {{ $dropActive === 'lomba' ? 'class=active' : '' }}>
              <i class="bi bi-circle"></i><span>Lomba</span>
            </a>
          </li>
          <li>
            <a href="{{ route('panitia.laporanpendaftar') }}" {{ $dropActive === 'lapPendaf' ? 'class=active' : '' }}>
              <i class="bi bi-circle"></i><span>Laporan Pendaftaran</span>
            </a>
          </li>
          <li>
            <a href="{{ route('donasi.laporan') }}" {{ $dropActive === 'lapDon' ? 'class=active' : '' }}>
              <i class="bi bi-circle"></i><span>Laporan Donasi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link {{ $active === 'profiles' ? '' : 'collapsed' }}" href="{{ route('profiles') }}">
          <i class="bi bi-person"></i>
          <span>Profile Panitia</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ $active === 'donaturs' ? '' : 'collapsed' }}" href="{{ route('donaturs') }}">
          <i class="bi bi-people"></i>
          <span>Data Donatur</span>
        </a>
      </li><!-- End donatur Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ $active === 'dokumentasi' ? '' : 'collapsed' }}" href="{{ route('dokumentasi') }}">
          <i class="bi bi-book"></i>
          <span>Dokumentasi</span>
        </a>
      </li><!-- End dokumentasi Nav -->

      <li class="nav-item">
        <a class="nav-link {{ $active === 'dataAdmin' ? '' : 'collapsed' }}" href="{{ route('dataAdmin') }}">
          <i class="bi bi-file-earmark"></i>
          <span>Data Admin</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  @yield('dashboard-content')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
