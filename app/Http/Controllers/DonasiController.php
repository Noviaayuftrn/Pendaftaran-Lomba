<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Donasi;
use App\Models\Donatur;

class DonasiController extends Controller
{
    //Sisi masyarakat
    public function create()
    {
        // Menentukan nomor rekening yang akan ditampilkan pada view
        $nomorRekening = '1234567890'; // Ganti dengan nomor rekening yang sesuai
        $active = 'dropdown';
        $dropActive = 'donasi';
        return view('masyarakat.donasi', compact('nomorRekening', 'active', 'dropActive'));
    }

    public function store(Request $request)
    {
        Log::info('Store method called');
        Log::info('Request data: ', $request->all());

        $request->validate([
            'NAMA_PENDONASI' => 'required|string|max:25',
            'ALAMAT_PENDONASI' => 'required|string|max:30',
            'NO_TLPN_PENDONASI' => 'required|numeric',
            'JUMLAH_DONASI' => 'required|numeric',
            'FOTO_BUKTI_TRANSFER' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'TGL_DONASI' => 'required|date',
        ]);

        Log::info('Validation passed');

        $path = null;
        if($request->hasFile('FOTO_BUKTI_TRANSFER')){
            $file = $request->file('FOTO_BUKTI_TRANSFER');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            Log::info('File uploaded: ' . $path);
        }

        Donasi::create([
            'NAMA_PENDONASI' => $request->NAMA_PENDONASI,
            'ALAMAT_PENDONASI' => $request->ALAMAT_PENDONASI,
            'NO_TLPN_PENDONASI' => $request->NO_TLPN_PENDONASI,
            'JUMLAH_DONASI' => $request->JUMLAH_DONASI,
            'FOTO_BUKTI_TRANSFER' => $path ?? null,
            'TGL_DONASI' => $request->TGL_DONASI,
        ]);

        Log::info('Donasi created');
        session()->flash('success', 'Terimah kasih sudah mendonasikan uang anda');

        return redirect()->route('donasi.create');
    }

    public function destroy(Donasi $donasi)
    {
        $donasi->delete();

        return redirect()->route('donasi.laporan')
                        ->with('success', 'Donasi deleted successfully.');
    }

    //sisi admin atau panitia
    public function laporan()
    {
        $donasi = Donasi::all();
        $active = 'dropdown';
        $dropActive = 'lapDon';
        $totalDonasi = $donasi->sum('JUMLAH_DONASI');
        $totalDonasiFormatted = 'Rp ' . number_format($totalDonasi, 0, ',', '.');
        return view('panitia.laporandonasi', compact('donasi', 'active', 'dropActive', 'totalDonasiFormatted'));
    }

    public function donatur()
    {
        $donaturs = Donatur::all()->unique('NAMA');
        $active = 'donaturs';
        $dropActive = '';
        return view('panitia.donatur', compact('donaturs','active', 'dropActive'));
    }

    public function showLaporan()
    {
    $donasi = Donasi::all();
    $totalDonasi = $donasi->sum('jumlah');
    return view('laporan', compact('donasi', 'totalDonasi'));
    }

}