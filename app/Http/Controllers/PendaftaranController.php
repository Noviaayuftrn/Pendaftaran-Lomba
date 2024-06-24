<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Lomba;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('masyarakat.pendaftaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA' => 'required|string|max:25',
            'UMUR' => 'required|string|max:3',
            'ALAMAT' => 'required|string|max:30',
            'JENIS_KELAMIN' => 'required|string|max:1',
            'NOMOR_TELPON' => 'required|numeric',
            'TANGGAL_PENDAFTARAN' => 'required|date',
        ]);

        Pendaftaran::create([
            'NAMA' => $request->NAMA,
            'UMUR' => $request->UMUR,
            'ALAMAT' => $request->ALAMAT,
            'JENIS_KELAMIN' => $request->JENIS_KELAMIN,
            'NOMOR_TELPON' => $request->NOMOR_TELPON,
            'TANGGAL_PENDAFTARAN' => $request->TANGGAL_PENDAFTARAN,
        ]);

        return redirect()->route('pendaftaran.create')->with('success', 'Pendaftaran berhasil.');
    }

    public function laporanPendaftar()
    {
        // Mengambil data masyarakat beserta lomba yang mereka pilih
        $pendaftars = Pendaftaran::with('lombas')->get();
        return view('panitia.laporanpendaftar', compact('pendaftars'));
    }
}

