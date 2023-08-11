<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoGrafis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Alert;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class InfoGrafisController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required'
        ]);
        if ($request->file('photo')) {
            $file = $request->file('photo')->store('photo-infografis', 'public');
        }
        InfoGrafis::create([
            "photo" => $file
        ]);
        FacadesAlert::success('Success', 'Data Berhasil Di Tambahkan');
        return redirect()->route('index-infografis');
    }

    public function create()
    {
        return view('dashboard.info-grafis.create');
    }

    public function index()
    {
        $info_grafis =InfoGrafis::paginate(10);
        return view('dashboard.info-grafis.index', compact('info_grafis'));
    }

    public function edit($id)
    {
        $info_grafis =InfoGrafis::where('id', $id)->first();
        return view('dashboard.info-grafis.edit', compact('info_grafis'));
    }

    public function update(Request $request, $id)
    {
        $info_grafis =InfoGrafis::where('id', $id)->first();
        if ($request->file('photo')) {
            if ($info_grafis->photo && file_exists(storage_path('app/public/', $info_grafis->photo))) {
                Storage::delete('public/'. $info_grafis->photo);
                $file = $request->file('photo')->store('photo-infografis', 'public');
            }
        }
        if ($request->file('photo') === null) {
            $file = $info_grafis->photo;
        }
        $info_grafis->update([
            "photo"=>$file,
        ]);
        FacadesAlert::success('Success', 'Data Berhasil Di Update');
        return redirect()->route('index-infografis');
    }

    public function delete($id)
    {
        $info_grafis =InfoGrafis::where('id', $id)->first();
        if ($info_grafis->photo && file_exists(storage_path('app/public/', $info_grafis->photo))) {
            Storage::delete('public/' . $info_grafis->photo);
        }
        $info_grafis->delete();
        FacadesAlert::success('Success', 'Data Berhasil Di Hapus');
        return redirect()->route('index-infografis');
    }
}
