<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;

class LombaController extends Controller
{
    public function lomba()
    {
        $lombas = Lomba::all();
        $active = 'dropdown';
        $dropActive = 'lomba';
        return view('panitia.lomba', compact('lombas', 'active', 'dropActive'));
    }

    public function store(Request $request)
    {
        $lomba = new Lomba;
        $lomba->NAMA_LOMBA = $request->nama_lomba;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $lomba->gambar = 'images/' . $filename;
        }

        $lomba->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $lomba = Lomba::find($id);
        if ($lomba) {
            if ($lomba->gambar && file_exists(public_path($lomba->gambar))) {
                unlink(public_path($lomba->gambar));
            }
            $lomba->delete();
        }

        return redirect()->back();
    }
}
