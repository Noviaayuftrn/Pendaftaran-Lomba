@extends('panitia/main')

@section('title', 'Admin-Laporan Donasi')

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
            <h1>Laporan Donasi</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Donasi</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Donasi</th>
                                        <th scope="col">Nama Pendonasi</th>
                                        <th scope="col">Alamat Pendonasi</th>
                                        <th scope="col">No. Telepon Pendonasi</th>
                                        <th scope="col">Uang Donasi</th>
                                        <th scope="col">Foto Bukti Transfer</th>
                                        <th scope="col">Tanggal Donasi</th>
                                        <th scope="col">Aksi</th> <!-- Kolom untuk tombol delete -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($donasi as $item)
                                    <tr>
                                        <td>{{ $item->ID_DONASI }}</td>
                                        <td>{{ $item->NAMA_PENDONASI }}</td>
                                        <td>{{ $item->ALAMAT_PENDONASI }}</td>
                                        <td>{{ $item->NO_TLPN_PENDONASI }}</td>
                                        <td>{{ 'Rp ' . number_format($item->JUMLAH_DONASI, 0, ',', '.') }}</td>
                                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewBukti{{ $item->ID_DONASI }}">
                                          Lihat</button></td>
                                        <td>{{ $item->TGL_DONASI }}</td>
                                        <td>
                                        <!-- Tombol untuk menghapus donasi pada super admin -->
                                        @if (auth()->user()->level == 1)
                                        <form action="{{ route('donasi.destroy', $item->ID_DONASI) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                        @endif
                                    </td>
                                    </tr>

                                    <!--Modal View Bukti -->
                                    <div class="modal fade" id="viewBukti{{ $item->ID_DONASI }}" tabindex="-1">
                                      <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="viewBuktiLabel{{ $item->ID_DONASI }}">Foto bukti transfer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <img src="{{ asset('storage/' . $item->FOTO_BUKTI_TRANSFER) }}" alt="Bukti Transfer" class="img-fluid">
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                            <tr>
                              <td clospan="2"> Total Donasi : </td>
                              <td>{{$totalDonasiFormatted}}</td>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

              
@endsection