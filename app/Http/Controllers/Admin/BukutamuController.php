<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bukutamu;
use Illuminate\Http\Request;
use Alert;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class BukutamuController extends Controller
{
    public function index()
    {
        $buku_tamu = Bukutamu::paginate(10);
        return view('dashboard.bukutamu.index', compact('buku_tamu'));
    }

    public function create()
    {
        return view('frontend2.bukutamu');
    }

    public function store(Request $request)
    {
        Bukutamu::create([
            "waktu"=>$request->input('waktu'),
            "nama"=>$request->input('nama'),
            "alamat"=>$request->input('alamat'),
            "keterangan"=>$request->input('keterangan'),
        ]);
        
        FacadesAlert::success('Berhasil', 'Data Anda sudah Dikirim');

        return redirect()->route('create-bukutamu');
    }

    public function delete($id)
    {
        $buku_tamu = Bukutamu::where('id', $id)->first();
        $buku_tamu->delete();
        return redirect()->route('delete-bukutamu');
    }
}
