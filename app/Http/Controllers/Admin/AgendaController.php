<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();
        return view('dashboard.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view('dashboard.agenda.create');
    }

    public function store(Request $request)
    {
        if ($request->file('photo')) {
            $file = $request->file('photo')->store('photo-agenda', 'public');
        }
        Agenda::create([
            "judul"=>$request->input('judul'),
            "photo"=>$file,
        ]);
        FacadesAlert::success('Success', 'Data Berhasil Di Tambahkan');
        return redirect()->route('index-agenda');
    }

    public function edit($id)
    {
        $agenda = Agenda::where('id', $id)->first();
        return view('dashboard.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::where('id', $id)->first();
        if ($request->file('photo')) {
            $file = $request->file('photo')->store('photo-agenda', 'public');
            if ($agenda->photo && file_exists(storage_path('app/public/', $agenda->photo))) {
                Storage::delete('public/'. $agenda->photo);
                $file = $request->file('photo')->store('photo-agenda', 'public');
            }
        }
        if ($request->file('photo') === null) {
            $file = $agenda->photo;
        }
        $agenda->update([
            "judul"=>$request->input('judul'),
            "photo"=>$file,
        ]);
        FacadesAlert::success('Success', 'Data Berhasil Di Update');
        return redirect()->route('index-agenda');
    }

    public function delete($id)
    {
        $agenda = Agenda::where('id', $id)->first();
        if ($agenda->photo && file_exists(storage_path('app/public/', $agenda->photo))) {
            Storage::delete('public/'. $agenda->photo);
        }

        $agenda->delete();
        FacadesAlert::success('Success', 'Data Berhasil Di Hapus');
        return redirect()->route('index-agenda');
    }
}
