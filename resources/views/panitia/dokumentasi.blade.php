@extends('panitia/main')

@section('title', 'Admin-Dokumentasi')

@section('dashboard-content')
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


      </div>
    </div><!-- End Left side columns -->

    </div><!-- End Right side columns -->

  </div>
</section>

</main><!-- End #main -->
@endsection
