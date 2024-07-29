@extends('Masyarakat/main')

@section('title', 'Profile')

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
                <hr>
            </div>
            @endforeach
        </div><!-- End profiles -->
    </div>
</div>

</div><!-- End Profil Panitia -->
            </div><!-- End Bordered Tabs -->

            </div>
        </div>

    </div>
    </div>
</section>

</main><!-- End #main -->
@endsection

