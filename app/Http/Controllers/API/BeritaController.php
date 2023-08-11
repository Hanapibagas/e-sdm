<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        if ($berita) {
            return response()->json([
                'success' => true,
                'message' => 'semua data berita',
                'data' => $berita,
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'semua data category gagal di tampilkan',
            ], 401);
        }
    }
}
