<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin-Laporan Pendaftar</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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


<!-- Custom CSS -->
<style>
    .table-container {
      padding: 20px;
    }

    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
      border-collapse: collapse;
    }

    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
      text-align: center;
    }

    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
      border-top: 2px solid #dee2e6;
    }

    .btn {
      margin: 0 5px;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="40">
          <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
        </a><!-- End Profile Image Icon -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>Kevin Anderson</h6>
            <span>Web Designer</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-box-arrow-right"></i>
              <span>Log Out</span>
            </a>
          </li>
        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->
    </ul>

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Formulir</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('lombas.lomba') }}">
              <i class="bi bi-circle"></i><span>Lomba</span>
            </a>
          </li>  
          <li>
            <a href="{{ route('panitia.laporanpendaftar') }}" class="active">
              <i class="bi bi-circle"></i><span>Laporan Pendaftaran</span>
            </a>
          </li>
          <li>
            <a href="{{ route('donasi.laporan') }}">
              <i class="bi bi-circle"></i><span>Laporan Donasi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('profiles') }}">
          <i class="bi bi-person"></i>
          <span>Profile Panitia</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('donaturs') }}">
          <i class="bi bi-people"></i>
          <span>Data Donatur</span>
        </a>
      </li><!-- End donatur Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dokumentasi') }}">
        <i class="bi bi-book"></i>
          <span>Dokumentasi</span>
        </a>
      </li><!-- End dokumentasi Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Data Admin</span>
        </a>
     </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Laporan Pendaftaran Lomba</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
          <div class="card-body">
              <h5 class="card-title">Filter Berdasarkan Lomba</h5>
              <form method="GET" action="{{ route('panitia.laporanpendaftar') }}">
                <div class="mb-3">
                  <label for="lomba" class="form-label">Pilih Lomba</label>
                  <select class="form-select" id="lomba" name="lomba">
                    <option value="">Semua Lomba</option>
                    @foreach($lombas as $lomba)
                    <option value="{{ $lomba->ID }}" {{ request('lomba') == $lomba->ID ? 'selected' : '' }}>
                      {{ $lomba->NAMA_LOMBA }}
                    </option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Tampilkan</button>
              </form>
            </div>
          
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Pendaftar</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Tanggal Pendaftaran</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Assuming you have a loop here to fill table rows -->
                  @foreach($pendaftars as $item)
                  <tr>
                      <td>{{ $item->NAMA }}</td>
                      <td>{{ $item->UMUR }}</td>
                      <td>{{ $item->ALAMAT }}</td>
                      <td>{{ $item->JENIS_KELAMIN }}</td>
                      <td>{{ $item->NOMOR_TELPON }}</td>
                      <td>{{ $item->TANGGAL_PENDAFTARAN }}</td>
                      <td>
                      <!-- Tombol untuk menghapus donasi -->
                      <form action="{{ route('pendaftaran.destroy', $item->ID_MASYARAKAT) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
