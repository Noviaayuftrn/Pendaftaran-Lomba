<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Donasi;

class DonasiController extends Controller
{
    //Sisi masyarakat
    public function create()
    {
        // Menentukan nomor rekening yang akan ditampilkan pada view
        $nomorRekening = '1234567890'; // Ganti dengan nomor rekening yang sesuai
        return view('masyarakat.donasi', compact('nomorRekening'));
    }

    public function store(Request $request)
    {
        Log::info('Store method called');
        Log::info('Request data: ', $request->all());

        $request->validate([
            'NAMA_PENDONASI' => 'required|string|max:25',
            'ALAMAT_PENDONASI' => 'required|string|max:30',
            'NO_TLPN_PENDONASI' => 'required|numeric',
            'FOTO_BUKTI_TRANSFER' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'FOTO_BUKTI_TRANSFER' => $path ?? null,
        ]);

        Log::info('Donasi created');

        return redirect()->route('donasi.create')->with('success', 'Donasi Tersimpan.');
    }

    //sisi admin atau panitia
    public function laporan()
    {
        $donasi = Donasi::all();
        return view('panitia.laporandonasi', compact('donasi'));
    }
}