<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class PengaturanController extends Controller
{
    public function index(){
        $pengaturan = Pengaturan::first();
        return view('dashboard.pengaturan',compact('pengaturan'));
    }

    public function update(Request $request,$id){
        $pengaturan = Pengaturan::findOrfail($id);
        if ($request->file('photo_kadis')) {
            $file_foto_kadis = $request->file('photo_kadis')->store('pengaturan', 'public');
            if ($pengaturan->foto_kadis && file_exists(storage_path('app/public/', $pengaturan->foto_kadis))) {
                Storage::delete('public/'. $pengaturan->foto_kadis);
                $file_foto_kadis = $request->file('photo_kadis')->store('pengaturan', 'public');
            }
        }else{
            $file_foto_kadis = $pengaturan->foto_kadis;
        }

        if ($request->file('image_background')) {
            $file_image_background = $request->file('image_background')->store('pengaturan', 'public');
            if ($pengaturan->image_background && file_exists(storage_path('app/public/', $pengaturan->image_background))) {
                Storage::delete('public/'. $pengaturan->image_background);
                $file_image_background = $request->file('image_background')->store('pengaturan', 'public');
            }
        }else{
            $file_image_background = $pengaturan->image_background;
        }

        $pengaturan->update([
            "nama_dinas"=>$request->input('nama_dinas'),
            "alamat_dinas"=>$request->input('alamat_dinas'),
            "nama_kadis"=>$request->input('nama_kadis'),
            "jabatan_kadis"=>$request->input('jabatan_kadis'),
            "foto_kadis"=>$file_foto_kadis,
            "image_background"=>$file_image_background,
            "primary_color"=>$request->input('primary_color'),
            "running_text"=>$request->input('running_text'),
        ]);
        FacadesAlert::success('Success', 'Data Berhasil Di Update');
        return redirect()->route('index-pengaturan');
    }
}
