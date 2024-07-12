<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<main id="main" class="main">


<div class="pagetitle">
  <h1>Formulir Pendaftaran Lomba {{ $lomba->NAMA_LOMBA }}</h1>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulir Data Diri</h5>

            <!-- Notifikasi -->
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

          <form class="row g-3" method="POST" action="{{ route('pendaftaran.store') }}">
            @csrf
           
            <div class="col-md-12">
              <input type="hidden" name="ID_LOMBA" value="{{ $lomba->id }}">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="NAMA" required maxlength="25">
            </div>
            <div class="col-md-6">
              <label for="umur" class="form-label">Umur</label>
              <input type="text" class="form-control" id="umur" name="UMUR" required maxlength="3">
            </div>
            <div class="col-md-6">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="ALAMAT" required maxlength="30">
            </div>
            <div class="col-md-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="JENIS_KELAMIN" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="col-12">
              <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
              <input type="text" class="form-control" id="nomor_telepon" name="NOMOR_TELPON" required>
            </div>
            <div class="col-12">
              <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
              <input type="date" class="form-control" id="tanggal_pendaftaran" name="TANGGAL_PENDAFTARAN" required>
            </div>
            <div class="text-center mt-3">
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            <!-- Tambahkan tombol kembali di sini -->
            <div class="container">
              <a href="{{ route('lombas.lomba') }}" class="btn btn-primary mt-3">Kembali ke Halaman Lomba</a>
            </div>
          </form><!-- End Formulir Pendaftaran -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
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
