<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{
    public function create()
    {
        $lombas = Lomba::all();
        return view('masyarakat.pendaftaran', compact('lombas'));
    }

    public function store(Request $request)
    {
        Log::info('Data yang diterima: ', $request->all());

        $request->validate([
            'NAMA' => 'required|string|max:25',
            'UMUR' => 'required|string|max:3',
            'ALAMAT' => 'required|string|max:30',
            'JENIS_KELAMIN' => 'required|string|max:1',
            'NOMOR_TELPON' => 'required|numeric|max:15',
            'TANGGAL_PENDAFTARAN' => 'required|date',
            'ID_LOMBA' => 'required',
        ]);
        Log::info('Validasi berhasil.');
        
        $pendaftaran = Pendaftaran::create([
            'NAMA' => $request->NAMA,
            'UMUR' => $request->UMUR,
            'ALAMAT' => $request->ALAMAT,
            'JENIS_KELAMIN' => $request->JENIS_KELAMIN,
            'NOMOR_TELPON' => $request->NOMOR_TELPON,
            'TANGGAL_PENDAFTARAN' => $request->TANGGAL_PENDAFTARAN,
            'ID_LOMBA' => $request->ID_LOMBA,
        ]);

        Log::info('Data berhasil disimpan.');
        
        return redirect()->route('pendaftaran.create')->with('success', 'Pendaftaran berhasil.');
    }

    public function laporanPendaftar(Request $request)
    {
        // Mengambil data masyarakat beserta lomba yang mereka pilih
        $pendaftars = Pendaftaran::all();
        $lombas = Lomba::all();
        $active = 'dropdown';
        $dropActive = 'lapPendaf';
        return view('panitia.laporanpendaftar', compact('pendaftars', 'lombas', 'active', 'dropActive'));
    }

    public function destroy($id)
    {
        // Cari data pendaftaran berdasarkan ID
        $masyarakat = Pendaftaran::findOrFail($id);

        // Hapus data pendaftaran
        $masyarakat->delete();
        return redirect()->route('panitia.laporanpendaftar')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
