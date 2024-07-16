@extends('Masyarakat/main')

@section('title', 'Donasi')

@section('dashboard-content')

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

              <!-- Tampilkan pesan jika sudah terkirim -->
              @if (session('success'))
              <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              <!-- akhir Tampilkan pesan jika sudah terkirim -->
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
                  <label for="JUMLAH_DONASI" class="form-label">Jumlah Uang Yang didonasikan </label>
                  <input type="text" class="form-control" id="JUMLAH_DONASI" name="JUMLAH_DONASI" required>
                </div>
                <div class="col-md-12">
                  <label for="FOTO_BUKTI_TRANSFER" class="form-label">Foto Bukti Transfer</label>
                  <input type="file" class="form-control" id="FOTO_BUKTI_TRANSFER" name="FOTO_BUKTI_TRANSFER" required>
                </div>
                <div class="col-12">
                  <label for="TGL_DONASI" class="form-label">Tanggal Pendaftaran</label>
                  <input type="date" class="form-control" id="TGL_DONASI" name="TGL_DONASI" required>
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

@endsection