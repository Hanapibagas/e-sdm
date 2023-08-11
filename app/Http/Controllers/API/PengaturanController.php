<?php

namespace App\Http\Controllers\API;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaturanController extends Controller
{
    public function pengaturan(){
        $pengaturan = Pengaturan::first();
        if ($pengaturan) {
            return response()->json([
                'success' => true,
                'message' => 'data pengaturan',
                'data' => $pengaturan,
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'data pengaturan gagal di tampilkan',
                'data' => []
            ], 401);
        }
    }
}
