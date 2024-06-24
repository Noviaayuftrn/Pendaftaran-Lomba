<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Formulir Donasi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">AgustusFestivity</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="40">
          <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
        </a>
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
          </ul>
        </li>
      </ul>
  </header>

  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html" >
              <i class="bi bi-circle"></i><span>Formulir Pendaftaran</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html" class="active">
              <i class="bi bi-circle"></i><span>Formulir Donasi</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile Panitia</span>
        </a>
      </li>
    </ul>
  </aside>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Formulir Donasi</h1>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulir Data Diri</h5>

              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <!-- Tampilkan Nomor Rekening -->
              <div class="alert alert-info" role="alert">
                Nomor Rekening "APLIKASI DANA" untuk Donasi: <strong>{{ $nomorRekening }}</strong>
              </div>
              <!-- Akhir Tampilkan Nomor Rekening -->

              <!-- Formulir Donasi -->
              <form class="row g-3" method="POST" action="{{ route('donasi.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <label for="NAMA_PENDONASI" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="NAMA_PENDONASI" name="NAMA_PENDONASI" required>
                </div>
                <div class="col-md-12">
                  <label for="ALAMAT_PENDONASI" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="ALAMAT_PENDONASI" name="ALAMAT_PENDONASI" required>
                </div>
                <div class="col-md-12">
                  <label for="NO_TLPN_PENDONASI" class="form-label">Nomor Telepon </label>
                  <input type="text" class="form-control" id="NO_TLPN_PENDONASI" name="NO_TLPN_PENDONASI" required>
                </div>
                <div class="col-md-12">
                  <label for="FOTO_BUKTI_TRANSFER" class="form-label">Foto Bukti Transfer</label>
                  <input type="file" class="form-control" id="FOTO_BUKTI_TRANSFER" name="FOTO_BUKTI_TRANSFER" required>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </form>
              <!-- End Formulir Donasi -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
