<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin-Jenis Lomba</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <style>
        .card-header {
            background-color: #ADD8E6;
            color: white;
            text-align: center;
        }
        .card-body img {
            max-width: 90%;
            height: auto;
        }
        .card {
        width: 350px; /* Adjust the width as needed */
        height: 500px;"
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        }
        .btn-primary {
            background-color: #0000FF;
            border-color: #0000FF;
            
        }
        .btn-delete {
            background-color: #FF0000;
            border-color: #FF0000;
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
                <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Formulir</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('lombas.lomba') }}" class="active">
                            <i class="bi bi-circle"></i><span>Lomba</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panitia.laporanpendaftar') }}">
                            <i class="bi bi-circle"></i><span>Laporan Pendaftaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('donasi.laporan') }}">
                            <i class="bi bi-circle"></i><span>Laporan donasi</span>
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
            <h1>Formulir Pendaftaran Lomba</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="container">
                <div class="d-flex justify-content-between mb-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLombaModal">ADD LOMBA</button>
                </div>
                <div class="row">
                    @foreach ($lombas as $lomba)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">{{ $lomba->NAMA_LOMBA }}</h5>
                            </div>
                            <div class="card-body d-flex flex-column align-items-center">
                                @if ($lomba->gambar)
                                <img src="{{ asset($lomba->gambar) }}" alt="Gambar Lomba" class="img-fluid mb-3" style="width: 250px; height: 250px;">
                                @else
                                <img src="https://via.placeholder.com/150" alt="Gambar Placeholder" class="img-fluid mb-3">
                                @endif
                                <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">Daftar</a>
                                <form action="{{ route('lombas.destroy', $lomba->ID_LOMBA) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- Modal Tambah Lomba -->
    <div class="modal fade" id="addLombaModal" tabindex="-1" role="dialog" aria-labelledby="addLombaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLombaModalLabel">Tambah Lomba</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lombas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lomba">Nama Lomba</label>
                            <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/vendor/quill/quill.js"></script>
    <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>
