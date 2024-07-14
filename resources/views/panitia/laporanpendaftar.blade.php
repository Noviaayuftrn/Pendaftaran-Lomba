@extends('panitia/main')

@section('title', 'Admin-Laporan Pendaftaran')

@section('style-css')
<style>
    .table-container {
      padding: 20px;
    }

    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
      border-collapse: collapse;
    }

    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
      text-align: center;
    }

    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
      border-top: 2px solid #dee2e6;
    }

    .btn {
      margin: 0 5px;
    }
  </style>
@endsection

@section('dashboard-content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Laporan Pendaftaran Lomba</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
          <div class="card-body">
              <h5 class="card-title">Filter Berdasarkan Lomba</h5>
                <form method="GET" action="{{ route('panitia.laporanpendaftar') }}">
                  <div class="mb-3">
                      <label for="lomba" class="form-label">Pilih Lomba</label>
                      <select class="form-select" id="lomba" name="lomba">
                          <option value="">Semua Lomba</option>
                          @foreach($lombas as $lomba)
                          <option value="{{ $lomba->ID_LOMBA }}" {{ request('lomba') == $lomba->ID_LOMBA ? 'selected' : '' }}>
                              {{ $lomba->NAMA_LOMBA }}
                          </option>
                          @endforeach
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Tampilkan</button>
              </form>
            </div>
          
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Pendaftar</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Tanggal Pendaftaran</th>
                    <th scope="col">Jenis Lomba</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Assuming you have a loop here to fill table rows -->
                  @foreach($pendaftars as $item)
                  <tr>
                      <td>{{ $item->NAMA }}</td>
                      <td>{{ $item->UMUR }}</td>
                      <td>{{ $item->ALAMAT }}</td>
                      <td>{{ $item->JENIS_KELAMIN }}</td>
                      <td>{{ $item->NOMOR_TELPON }}</td>
                      <td>{{ $item->TANGGAL_PENDAFTARAN }}</td>
                      <td>{{ $item->lomba->NAMA_LOMBA }}</td>
                      <td>
                      <!-- Tombol untuk menghapus donasi -->
                      <form action="{{ route('pendaftaran.destroy', $item->ID_MASYARAKAT) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  @endsection
