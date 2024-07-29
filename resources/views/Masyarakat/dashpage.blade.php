@extends('Masyarakat/main')

@section('title', 'dashpage')

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
                </div>

                <!-- Loop through posts from the database -->
                @foreach($posts as $post)
                <div class="col-xxl-12 col-md-6 ">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
<!-- End of Dokumentasi -->

<!-- Informasi -->
<div class="card mb-3">
  <div class="card-body pb-0">
      <h5 class="card-title">Informasi</h5>

      <div class="news">
          <!-- Loop through topics from the database -->
          @foreach($topics as $topic)
          <div class="post-item clearfix mb-5">
              <img src="{{ asset('storage/' . $topic->image) }}" alt="Topic Image" class="float-start me-3">
              <h4><a href="#">{{ $topic->judul }}</a></h4>            
            <!-- Show Button -->
            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewTopik{{ $topic->id }}">
              Show</button></td>
          </div>
          <!--Modal View Bukti -->
          <div class="modal fade" id="viewTopik{{ $topic->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="#viewTopikLabel{{ $topic->id }}">{{$topic->judul}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center" style="min-height: 300px;">
                        <img src="{{ asset('storage/' . $topic->image) }}" alt="" class="img-fluid" style="width:50%;">
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                </div>
            </div>
          </div>
          @endforeach
      </div><!-- End news -->
  </div>
</div><!-- End Informasi -->


      </div>
    </div><!-- End Left side columns -->

    </div><!-- End Right side columns -->

  </div>
</section>

</main><!-- End #main -->

@endsection