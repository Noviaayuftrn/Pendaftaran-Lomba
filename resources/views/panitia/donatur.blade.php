@extends('panitia/main')

@section('title', 'Admin-Data Donatur')

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
            <h1>Laporan Donatur</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Donatur</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Donatur</th>
                                        <th scope="col">Alamat Donatur</th>
                                        <th scope="col">No. Telepon Pendonatur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($donaturs as $donatur)
                                    <tr>
                                    <td>{{ $donatur->ID_DONASI }}</td>
                                    <td>{{ $donatur->NAMA }}</td>
                                    <td>{{ $donatur->ALAMAT }}</td>
                                    <td>{{ $donatur->NO_TELPON }}</td>
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