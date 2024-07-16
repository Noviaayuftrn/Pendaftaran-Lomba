<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Lomba;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /*public function laporan(Request $request)
    {
        $selectedLomba = $request->input('lomba_id');
        $lombas = Lomba::all();
        $active = 'dropdown';
        $dropActive = 'lapPendaf';

        $pendaftars = Pendaftaran::when($selectedLomba, function($query) use ($selectedLomba) {
            return $query->where('lomba_id', $selectedLomba);
        })->get();

        return view('panitia.laporanpendaftar', compact('pendaftars', 'lombas', 'selectedLomba', 'active','dropActive'));
    }*/

    public function laporan(Request $request)
{
    // Mengambil data semua lomba
    $lombas = Lomba::all();

    // Mengambil data pendaftar sesuai filter lomba
    $query = Pendaftaran::query();

    if ($request->has('lomba') && $request->lomba != '') {
        $query->where('ID_LOMBA', $request->lomba); // ganti 'lomba_id' dengan nama field yang sesuai di tabel pendaftaran
    }

    $pendaftars = $query->get();

    $active = 'dropdown';
    $dropActive = 'lapPendaf';

    return view('panitia.laporanpendaftar', compact('pendaftars', 'lombas', 'active', 'dropActive'));
}

}
