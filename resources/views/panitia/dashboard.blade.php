<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard 444</title>
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
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">AgustusFestivity</span>
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

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Formulir</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('lombas.lomba') }}">
              <i class="bi bi-circle"></i><span>Lomba</span>
            </a>
          </li>
          <li>
            <a href="{{ route('panitia.laporanpendaftar') }}">
              <i class="bi bi-circle"></i><span>Laporan Pendaftaran</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
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
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Data Admin</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            
                <!--Section Dokumentasi-->
                <div class="row">
                    <div class="col-12">
                        <a href="#createPostModal" class="btn btn-primary mb-3" data-bs-toggle="modal">Add New Post</a>
                    </div>

                    <!-- Loop through posts from the database -->
                    @foreach($posts as $post)
                    <div class="col-xxl-12 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Dokumentasi</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-link"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Title: {{ $post->title }}</h6>
                                        <p>Link: <a href="{{ $post->link }}">{{ $post->link }}</a></p>
                                        <a href="#editPostModal{{ $post->id }}" class="btn btn-warning btn-sm" data-bs-toggle="modal">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Post Modal -->
                <div class="modal fade" id="editPostModal{{ $post->id }}" tabindex="-1" aria-labelledby="editPostModalLabel{{ $post->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPostModalLabel{{ $post->id }}">Edit Post</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="edit-title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="edit-title" name="title" value="{{ $post->title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit-link" class="form-label">Link</label>
                                        <input type="text" class="form-control" id="edit-link" name="link" value="{{ $post->link }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                    @endforeach

                    
                    <!-- Create Post Modal -->
                <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createPostModalLabel">Add New Post</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('posts.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="form-label">Link</label>
                                        <input type="text" class="form-control" id="link" name="link" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create Post</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<!-- Notification Message -->
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
<!-- End of Notification Message -->

</div>

<!-- Menampilkan link navigasi -->
{{ $posts->links() }}
<!-- End of Dokumentasi -->

<hr>


 <!-- Informasi -->
 <div class="card">
      <div class="card-body pb-0">
          <h5 class="card-title">Informasi</h5>

          <div class="news">
              <!-- Loop through topics from the database -->
              @foreach($topics as $topic)
              <div class="post-item clearfix">
                  <img src="{{ asset('storage/' . $topic->image) }}" alt="Topic Image" class="float-start me-3">
                  <h4><a href="#">{{ $topic->judul }}</a></h4>
                  <!-- Delete Button -->
                <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                <!-- Show Button -->
                <a href="{{ route('topics.show', $topic->id) }}" class="btn btn-primary btn-sm">Show</a>
              </div>
              @endforeach
          </div><!-- End news -->

      </div>
  </div><!-- End Informasi -->

  <!-- Create Topic Form -->
  <div class="card">
      <div class="card-body">
          <h5 class="card-title">Create New Topic</h5>
          <form action="{{ route('topics.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="title" class="form-label">judul</label>
                  <input type="text" class="form-control" id="title" name="title" required>
              </div>
              <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
              </div>
              <button type="submit" class="btn btn-primary">Create Topic</button>
          </form>
      </div>
  </div><!-- End Create Topic Form -->

  <!-- Edit Topic Form -->
  @foreach($topics as $topic)
  <div class="modal fade" id="editTopicModal{{ $topic->id }}" tabindex="-1" aria-labelledby="editTopicModalLabel{{ $topic->id }}" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editTopicModalLabel{{ $topic->id }}">Edit Topic</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('topics.update', $topic->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                          <label for="title" class="form-label">judul</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{ $topic->title }}" required>
                      </div>
                      <div class="mb-3">
                          <label for="image" class="form-label">Image</label>
                          <input type="file" class="form-control" id="image" name="image" accept="image/*">
                      </div>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  @endforeach
  <!-- End Edit Topic Form -->

  <!-- Delete Topic Form -->
  @foreach($topics as $topic)
  <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" id="deleteTopicForm{{ $topic->id }}">
      @csrf
      @method('DELETE')
  </form>
  @endforeach
  <!-- End Delete Topic Form -->

               


          </div>
        </div><!-- End Left side columns -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

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