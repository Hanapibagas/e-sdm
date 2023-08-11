<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index()
    {
        $video = Video::first();
        if ($video) {
            return response()->json([
                'success' => true,
                'message' => 'semua data video',
                'data' => $video,
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'semua data video gagal di tampilkan',
            ], 401);
        }
    }
}
