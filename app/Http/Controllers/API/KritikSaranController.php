<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kritiksaran;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class KritikSaranController extends Controller
{
    public function store(Request $request)
    {
        $kritiksaran = validator::make($request->all(),[
                'kritik'=>'required',
                'saran'=>'required',
            ],[
                'kritik'=>'anda belum isi kolom kritik',
                'saran'=>'anda belum isi kolom saran',
            ]
        );

        if ($kritiksaran->failed()) {
            return response()->json([
                'succes'=>false,
                'message'=>'anda belum mengisi datanya',
                'data'=>$kritiksaran->errors()
            ], 401);
        }
        else {
            $kritiksaran = Kritiksaran::create([
                'kritik'=>$request->input('kritik'),
                'saran'=>$request->input('saran'),
            ]);

            if ($kritiksaran) {
                return response()->json([
                    'success'=>true,
                    'message'=>'data telah di tambahkan',
                    'data'=>$kritiksaran,
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
        $kritiksaran = Kritiksaran::all();
        if ($kritiksaran) {
            return response()->json([
                'succes'=>true,
                'message'=>'data berhasil di tampilkan',
                'data'=>$kritiksaran
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
        $kritiksaran = validator::make($request->all(),[
                'kritik'=>'required',
                'saran'=>'required',
            ],[
                'kritik'=>'anda belum isi kolom kritik',
                'saran'=>'anda belum isi kolom saran',
            ]
        );

        if ($kritiksaran->fails()) {
            return response()->json([
                'success'=> false,
                'message'=>'silahkan isi yang masih kosong',
                'data'=>$kritiksaran->errors(),
            ],401);
        } else {
            $kritiksaran = Kritiksaran::where('id', $id)->first();
            $kritiksaran->update([
                'kritik'=>$request->input('kritik'),
                'saran'=>$request->input('saran'),
            ]);
            if ($kritiksaran) {
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
        $kritiksaran = Kritiksaran::where('id', $id)->first();
        $kritiksaran->delete();
        if ($kritiksaran) {
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
