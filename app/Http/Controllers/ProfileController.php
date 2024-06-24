<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        $profiles = Profile::all();
        return view('panitia.profile', compact('profiles'));
    }

    public function create()
    {
        return view('panitia.create_profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'nomor_telepon' => 'required',
            'gambar' => 'nullable|image',
        ]);

        $path = $request->hasFile('gambar') ? $request->file('gambar')->store('profiles', 'public') : null;

        Profile::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nomor_telepon' => $request->nomor_telepon,
            'gambar' => $path,
        ]);

        return redirect()->route('profiles');
    }

    public function edit(Profile $profile)
    {
        return view('panitia.edit_profile', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'nomor_telepon' => 'required',
            'gambar' => 'nullable|image',
        ]);

        if ($request->hasFile('gambar')) {
            if ($profile->gambar) {
                Storage::disk('public')->delete($profile->gambar);
            }
            $path = $request->file('gambar')->store('profiles', 'public');
        } else {
            $path = $profile->gambar;
        }

        $profile->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nomor_telepon' => $request->nomor_telepon,
            'gambar' => $path,
        ]);

        return redirect()->route('profiles');
    }

    public function destroy(Profile $profile)
    {
        if ($profile->gambar) {
            Storage::disk('public')->delete($profile->gambar);
        }
        $profile->delete();

        return redirect()->route('profiles');
    }
}
