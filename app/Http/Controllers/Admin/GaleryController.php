<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class GaleryController extends Controller
{
    public function index()
    {
        $galery = Galery::all();
        return view('dashboard.galery.index', compact('galery'));
    }

    public function create()
    {
        return view('dashboard.galery.create');
    }

    public function store(Request $request)
    {
        if ($request->file('photo')) {
            $file = $request->file('photo')->store('photo-galery', 'public');
        }
        Galery::create([
            "judul"=>$request->input('judul'),
            "photo"=>$file,
        ]);
        FacadesAlert::success('Success', 'Data Berhasil Di Tambahkan');
        return redirect()->route('index-galery');
    }

    public function edit($id)
    {
        $galery = Galery::where('id', $id)->first();
        return view('dashboard.galery.edit', compact('galery'));
    }

    public function update(Request $request, $id)
    {
        $galery = Galery::where('id', $id)->first();
        if ($request->file('photo')) {
            if ($galery->photo && file_exists(storage_path('app/public/', $galery->photo))) {
                Storage::delete('public/'. $galery->photo);
                $file = $request->file('photo')->store('photo-galery', 'public');
            }
        }
        if ($request->file('photo') === null) {
            $file = $galery->photo;
        }
        $galery->update([
            "judul"=>$request->input('judul'),
            "photo"=>$file,
        ]);
        FacadesAlert::success('Success', 'Data Berhasil Di Update');
        return redirect()->route('index-galery');
    }

    public function delete($id)
    {
        $galery = Galery::where('id', $id)->first();
        if ($galery->photo && file_exists(storage_path('app/public/', $galery->photo))) {
            Storage::delete('public/'. $galery->photo);
        }

        $galery->delete();
        FacadesAlert::success('Success', 'Data Berhasil Di Hapus');
        return redirect()->route('index-galery');
    }

}
