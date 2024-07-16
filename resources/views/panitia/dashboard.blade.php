@extends('panitia/main')

@section('title', 'Admin Dashboard')

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

        <!-- Informasi -->
        <div class="card">
          <div class="card-body pb-0">
            <h5 class="card-title">Informasi</h5>

            <div class="news">

              <!-- Loop through topics from the database -->
              @foreach($topics as $topic)
              <div class="post-item clearfix">
                <h4><a href="#">{{ $topic->judul }}</a></h4>
                <img src="{{ asset('storage/' . $topic->image) }}" alt="Topic Image" class="float-start me-3" style="width: 700px; height: 700px;">
                <!-- Delete Button -->
                <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTopicModal{{ $topic->id }}">
              Edit</button>
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
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
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
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $topic->judul }}" required>
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

  </div>
</section>

</main><!-- End #main -->
@endsection