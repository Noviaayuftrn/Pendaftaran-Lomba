@extends('panitia/main')

@section('title', 'Admin-Profile')

@section('dashboard-content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile Panitia</h1>
</div><!-- End Page Title -->

<div class="card">
  <div class="card-body pb-0">
      <h5 class="card-title">Profile Panitia</h5>

      <div class="profiles">
          <!-- Loop through profiles from the database -->
          @foreach($profiles as $profile)
          <div class="profile-item clearfix">
              @if($profile->gambar)
                  <img src="{{ asset('storage/' . $profile->gambar) }}" alt="Profile Image" class="float-start me-3 mt-2" style="width: 100px; height: 100px;">
              @else
                  <img src="{{ asset('storage/default.png') }}" alt="Default Image" class="float-start me-3 mt-2" style="width: 100px; height: 100px;"> 
              @endif
              <h4>{{ $profile->nama }}</h4>
              <p>{{ $profile->jabatan }}</p>
              <p>{{ $profile->nomor_telepon }}</p>

              <span class="ml-2"></span>
              <!-- Button to trigger edit modal -->
              <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#editProfileModal{{ $profile->id }}">Edit</button>
              <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-3">Delete</button>
              </form>
              <span class="ml-2"></span>
          </div>
          @endforeach
      </div><!-- End profiles -->
  </div>
</div>

  </div><!-- End Profil Panitia -->

  <!-- Create Profile Form -->
  <div class="card">
      <div class="card-body">
          <h5 class="card-title">Create New Profile</h5>
          <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
              <div class="mb-3">
                  <label for="jabatan" class="form-label">Jabatan</label>
                  <input type="text" class="form-control" id="jabatan" name="jabatan" required>
              </div>
              <div class="mb-3">
                  <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                  <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
              </div>
              <div class="mb-3">
                  <label for="gambar" class="form-label">Image</label>
                  <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
              </div>
              <button type="submit" class="btn btn-primary">Create Profile</button>
              <span class="ml-2"></span>
          </form>
      </div>
  </div><!-- End Create Profile Form -->

  <!-- Edit Profile Modals -->
  @foreach($profiles as $profile)
  <div class="modal fade" id="editProfileModal{{ $profile->id }}" tabindex="-1" aria-labelledby="editProfileModalLabel{{ $profile->id }}" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editProfileModalLabel{{ $profile->id }}">Edit Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama" value="{{ $profile->nama }}" required>
                      </div>
                      <div class="mb-3">
                          <label for="jabatan" class="form-label">Jabatan</label>
                          <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $profile->jabatan }}" required>
                      </div>
                      <div class="mb-3">
                          <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                          <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $profile->nomor_telepon }}" required>
                      </div>
                      <div class="mb-3">
                          <label for="gambar" class="form-label">Image</label>
                          <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                      </div>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                  </form>
              </div>
          </div>
  </div>
</div>
@endforeach


            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection

