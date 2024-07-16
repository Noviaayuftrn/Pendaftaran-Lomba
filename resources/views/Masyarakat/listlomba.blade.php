@extends('Masyarakat/main')

@section('title', 'List Lomba')

@section('style-css')

<style>
        .card-header {
            background-color: #ADD8E6;
            color: white;
            text-align: center;
        }
        .card-body img {
            max-width: 90%;
            height: auto;
        }
        .card {
        width: 300px; /* Adjust the width as needed */
        height: 200px;"
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        }
        .btn-primary {
            background-color: #0000FF;
            border-color: #0000FF;
            
        }
        .btn-delete {
            background-color: #FF0000;
            border-color: #FF0000;
        }
    </style>

@endsection

@section('dashboard-content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Formulir Pendaftaran Lomba</h1>
</div><!-- End Page Title -->


<section class="section">
    <div class="container">
    <div class="row">
            <div class="col-md-4 mb-4">
            <div class="col-lg-6">

            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Lomba 17 Agustus</h5>
                <p>Klik di sini untuk mendaftarkan diri</p>
                <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">Daftar</a>
            </div>
            </div>

            </div>
            </div>
        </div>
        
        <div class="pagetitle">
            <h1>Jenis-Jenis Lomba</h1>
        </div><!-- End Page Title -->
        <div class="row">
            @foreach ($lombas as $lomba)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $lomba->NAMA_LOMBA }}</h5>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center">
                        @if ($lomba->gambar)
                        <img src="{{ asset($lomba->gambar) }}" alt="Gambar Lomba" class="img-fluid mb-3" style="width: 250px; height: 250px;">
                        @else
                        <img src="https://via.placeholder.com/150" alt="Gambar Placeholder" class="img-fluid mb-3">
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

</main><!-- End #main -->

@endsection

