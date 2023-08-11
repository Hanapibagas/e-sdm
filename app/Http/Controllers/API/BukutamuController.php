<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bukutamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukutamuController extends Controller
{
    public function store(Request $request)
    {
        $bukutamu = validator::make($request->all(),[
                'waktu'=>'required',
                'nama'=>'required',
                'alamat'=>'required',
                'keterangan'=>'required',
            ],[
                'waktu'=>'anda belum isi kolom waktu',
                'nama'=>'anda belum isi kolom nama',
                'alamat'=>'anda belum isi kolom alamat',
                'keterangan'=>'anda belum isi kolom keterangan',
            ]
        );

        if ($bukutamu->fails()) {
            return response()->json([
                'succes'=>false,
                'message'=>'anda belum mengisi datanya',
                'data'=>$bukutamu->errors()
            ], 401);
        } else {
            $bukutamu = Bukutamu::create([
                'waktu'=>$request->input('waktu'),
                'nama'=>$request->input('nama'),
                'alamat'=>$request->input('alamat'),
                'keterangan'=>$request->input('keterangan'),
            ]);

            if ($bukutamu) {
                return response()->json([
                    'success'=>true,
                    'message'=>'data telah di tambahkan',
                    'data'=>$bukutamu,
                ], 200);
            } else {
                return response()->json([
                'success'=>false,
                'message'=>'data belum di tambahkan'
                ]);
            }
        }
    }

    public function index()
    {
        $bukutamu = Bukutamu::all();
        if ($bukutamu) {
            return response()->json([
                'succes'=>true,
                'message'=>'data berhasil di tampilkan',
                'data'=>$bukutamu
            ]);
        }else {
            return response()->json([
                'succes'=>false,
                'message'=>'data kritik dan saran tidak bisa di tampilkan'
            ], 401);

        }
    }

    public function update(Request $request, $id)
    {
        $bukutamu = validator::make($request->all(),[
                'waktu'=>'required',
                'nama'=>'required',
                'alamat'=>'required',
                'keterangan'=>'required',
            ],[
                'waktu'=>'anda belum isi kolom waktu',
                'nama'=>'anda belum isi kolom nama',
                'alamat'=>'anda belum isi kolom alamat',
                'keterangan'=>'anda belum isi kolom keterangan',
            ]
        );
        if ($bukutamu->fails()) {
            return response()->json([
                'success'=> false,
                'message'=>'silahkan isi yang masih kosong',
                'data'=>$bukutamu->errors(),
            ], 401);
        } else {
            $bukutamu = Bukutamu::where('id', $id)->first();
            $bukutamu->update([
                'waktu'=>$request->input('waktu'),
                'nama'=>$request->input('nama'),
                'alamat'=>$request->input('alamat'),
                'keterangan'=>$request->input('keterangan'),
            ]);
            if ($bukutamu) {
                return response()->json([
                    'success'=>true,
                    'message'=>'data telah di update',
                ], 200);
            } else {
                return response()->json([
                    'success'=>false,
                    'message'=>'data belum di update'
                    ]);
            }   
        }        
    }

    public function delete($id)
    {
        $bukutamu = Bukutamu::where('id', $id)->first();
        $bukutamu->delete();
        if ($bukutamu) {
            return response()->json([
                'success' => true,
                'message' => 'data telah dihapus',
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'data belum terhapus',
            ]);
        }
    }
}
