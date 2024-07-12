<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('masyarakat.pendaftaran', compact('pendaftars'));
    }

    public function store(Request $request)
    {
        Log::info('Data yang diterima: ', $request->all());

        $request->validate([
            'NAMA' => 'required|string|max:25',
            'UMUR' => 'required|string|max:3',
            'ALAMAT' => 'required|string|max:30',
            'JENIS_KELAMIN' => 'required|string|max:1',
            'NOMOR_TELPON' => 'required|numeric',
            'TANGGAL_PENDAFTARAN' => 'required|date',
            'ID_LOMBA' => 'required|exists:lombas,id',
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
        $query = Pendaftaran::query();

        if ($request->has('lomba') && $request->lomba != '') {
            $query->where('ID_LOMBA', $request->lomba);
        }

        $pendaftars = $query->get();
        $lombas = Lomba::all();
        // Kembalikan view dengan data
        return view('panitia.laporanpendaftar', compact('pendaftars', 'lombas'));
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
