@extends('panitia/main')

@section('title', 'Admin Lomba')

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

<section class="section">
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLombaModal">ADD LOMBA</button>
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
                        
                        <form action="{{ route('lombas.destroy', $lomba->ID_LOMBA) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

</main><!-- End #main -->

<!-- Modal Tambah Lomba -->
<div class="modal fade" id="addLombaModal" tabindex="-1" role="dialog" aria-labelledby="addLombaModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addLombaModalLabel">Tambah Lomba</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('lombas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_lomba">Nama Lomba</label>
                    <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection