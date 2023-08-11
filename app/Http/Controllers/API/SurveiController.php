<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SurveiController extends Controller
{
    public function store(Request $request)
    {

        $survei = validator::make($request->all(),[
                'nama_lengkap'=>'required',
                'email'=>'required',
                'jenis_klm'=>'required',
                'jawab1'=>'required',
                'jawab2'=>'required',
                'jawab3'=>'required',
            ],[
                'nama_lengkap'=>'anda belum isi kolom nama_lengkap',
                'email'=>'anda belum isi kolom email',
                'jenis_klm'=>'anda belum isi kolom jenis_klm',
                'jawab1'=>'anda belum isi kolom jawab1',
                'jawab2'=>'anda belum isi kolom jawab2',
                'jawab3'=>'anda belum isi kolom jawab3',
            ]
        );

        if ($survei->fails()) {
            return response()->json([
                'succes'=>false,
                'message'=>'anda belum mengisi datanya',
                'data'=>$survei->errors()
            ], 401);
        }else {
            $survei = Survei::create([
                'nama_lengkap'=>$request->input('nama_lengkap'),
                'email'=>$request->input('email'),
                'jenis_klm'=>$request->input('jenis_klm'),
                'jawab1'=>$request->input('jawab1'),
                'jawab2'=>$request->input('jawab2'),
                'jawab3'=>$request->input('jawab3'),
            ]);

            if ($survei) {
                return response()->json([
                    'success'=>true,
                    'message'=>'data telah di tambahkan',
                    'data'=>$survei,
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
        $survei = Survei::all();
        if ($survei) {
            return response()->json([
                'succes'=>true,
                'message'=>'data survei berhasil di tampilkan',
                'data'=>$survei
            ], 200);
        }else {
            return response()->json([
                'succes'=>false,
                'message'=>'data survei tidak bisa di tampilkan'
            ], 401);
        }
    }

    public function update(Request $request, $id)
    {
        $survei = validator::make($request->all(),[
                'nama_lengkap'=>'required',
                'email'=>'required',
                'jenis_klm'=>'required',
                'jawab1'=>'required',
                'jawab2'=>'required',
                'jawab3'=>'required',
            ],[
                'nama_lengkap'=>'anda belum isi kolom nama_lengkap',
                'email'=>'anda belum isi kolom email',
                'jenis_klm'=>'anda belum isi kolom jenis_klm',
                'jawab1'=>'anda belum isi kolom jawab1',
                'jawab2'=>'anda belum isi kolom jawab2',
                'jawab3'=>'anda belum isi kolom jawab3',
            ]
        );

        if ($survei->fails()) {
            return response()->json([
                'succes'=>false,
                'message'=>'anda belum mengisi datanya',
                'data'=>$survei->errors()
            ], 401);
        } else {
            $survei = Survei::where('id', $id)->first();
            $survei->update([
                'nama_lengkap'=>$request->input('nama_lengkap'),
                'email'=>$request->input('email'),
                'jenis_klm'=>$request->input('jenis_klm'),
                'jawab1'=>$request->input('jawab1'),
                'jawab2'=>$request->input('jawab2'),
                'jawab3'=>$request->input('jawab3'),
            ]);

            if ($survei) {
                return response()->json([
                    'succes'=>true,
                    'message'=>'data survei berhasil di update',
                    'data'=>$survei
                ], 200);
            }else {
                return response()->json([
                    'succes'=>false,
                    'message'=>'data survei tidak bisa di update'
                ], 401);
            }
        }
    }

    public function delete($id)
    {
        $survei = Survei::where('id', $id)->first();
        $survei->delete();
        if ($survei) {
            return response()->json([
                'succes'=>true,
                'message'=>'data survei berhasil di delete',
                'data'=>$survei
            ], 200);
        }else {
            return response()->json([
                'succes'=>false,
                'message'=>'data survei tidak bisa di delete'
            ], 401);
        }
    }
}
