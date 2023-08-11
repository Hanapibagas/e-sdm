<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kritiksaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class KritikSaranController extends Controller
{
    public function index()
    {
        $kritiksaran = Kritiksaran::paginate(10);
        return view('dashboard.kritikdansaran.index', compact('kritiksaran'));
    }

    public function create()
    {
        return view('frontend2.kritiksaran');
    }

    public function store(Request $request)
    {
        Kritiksaran::create([
            "kritik"=>$request->input('kritik'),
            "saran"=>$request->input('saran'),
        ]);

        FacadesAlert::success('Success', 'Data Berhasil Di Tambahkan');
        return redirect()->route('index-kritik');
    }

    public function delete($id)
    {
        $kritiksaran = Kritiksaran::where('id', $id)->first();
        $kritiksaran->delete();
        FacadesAlert::success('Success', 'Data Berhasil Di Hapus');
        return redirect()->route('index-kritik');
    }
}
