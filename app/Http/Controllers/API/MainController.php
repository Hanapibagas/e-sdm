<?php

namespace App\Http\Controllers\Api;

use App\Models\Agenda;
use App\Models\InfoGrafis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function infoGrafis(){
        $info_grafis = InfoGrafis::all();
        if ($info_grafis) {
            return response()->json([
                'succes'=>true,
                'message'=>'data berhasil di tampilkan',
                'data'=>$info_grafis
            ]);
        }else {
            return response()->json([
                'succes'=>false,
                'message'=>'data info grafis tidak bisa di tampilkan'
            ], 401);

        }
    }

    public function agenda(){
        $agenda = Agenda::all();
        if ($agenda) {
            return response()->json([
                'succes'=>true,
                'message'=>'data berhasil di tampilkan',
                'data'=>$agenda
            ]);
        }else {
            return response()->json([
                'succes'=>false,
                'message'=>'data agenda tidak bisa di tampilkan'
            ], 401);

        }
    }
}
