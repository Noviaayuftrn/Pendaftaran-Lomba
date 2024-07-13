<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Lomba;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan(Request $request)
    {
        $selectedLomba = $request->input('lomba_id');
        $lombas = Lomba::all();
        $dropActive = 'lapPendaf';

        $pendaftars = Pendaftaran::when($selectedLomba, function($query) use ($selectedLomba) {
            return $query->where('lomba_id', $selectedLomba);
        })->get();

        return view('panitia.laporanpendaftar', compact('pendaftars', 'lombas', 'selectedLomba'));
    }
}
