<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $galery = Galery::all();
        if ($galery) {
            return response()->json([
                'success' => true,
                'message' => 'semua data galery',
                'data' => $galery,
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'semua data galery gagal di tampilkan',
            ], 401);
        }
    }
    
}
