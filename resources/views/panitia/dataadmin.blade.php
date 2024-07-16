@extends('panitia/main')

@section('title', 'Admin-Data Admin')

@section('dashboard-content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data admin</h1>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
            @foreach($Users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
@endsection