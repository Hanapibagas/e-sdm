<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('dashboard.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('dashboard.berita.create');
    }

    public function store(Request $request)
    {

        if ($request->file('photo')) {
            $file = $request->file('photo')->store('photo-berita', 'public');
        }
        Berita::create([
            "title"=>$request->input('title'),
            "description"=>$request->input('description'),
            "photo"=>$file
        ]);

        FacadesAlert::success('Success', 'Data Berhasil Di Tambahkan');
        return redirect()->route('index-berita');
    }

    public function edit($id)
    {
        $berita = Berita::where('id', $id)->first();
        return view('dashboard.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::where('id', $id)->first();

        if ($request->file('photo')) {
            if ($berita->photo && file_exists(storage_path('app/public/', $berita->photo))) {
                Storage::delete('public/'. $berita->photo);
                $file = $request->file('photo')->store('photo-berita', 'public');
            }
        }
        if ($request->file('photo') === null) {
            $file = $berita->photo;
        }

        $berita->update([
            "title"=>$request->input('title'),
            "description"=>$request->input('description'),
            "photo"=>$file
        ]);
        FacadesAlert::success('Success', 'Data Berhasil Di Update');
        return redirect()->route('index-berita');
    }

    public function delete($id)
    {
        $berita = Berita::where('id', $id)->first();
        if ($berita->photo && file_exists(storage_path('app/public/', $berita->photo))) {
            Storage::delete('public/'. $berita->photo);
        }
        $berita->delete();
        FacadesAlert::success('Success', 'Data Berhasil Di Delete');
        return redirect()->route('index-berita');
    }
}
