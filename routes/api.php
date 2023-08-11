<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MainController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VideoController;
use App\Http\Controllers\API\BeritaController;
use App\Http\Controllers\API\GaleryController;
use App\Http\Controllers\Admin\SurveiController;
use App\Http\Controllers\API\PengaturanController;


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/detail', [UserController::class, 'details']);
});


// route video
Route::get('/video', [VideoController::class, 'index']);
// route berita
Route::get('/berita', [BeritaController::class, 'index']);
// route galery
Route::get('/galery', [GaleryController::class, 'index']);

// route kritik
Route::post('/kritik/create', [KritikSaranController::class, 'store']);
// route saran
Route::post('/saran/create', [KritikSaranController::class, 'store']);
// route buku tamu
Route::post('/bukutamu/create', [KritikSaranController::class, 'store']);
// route pengaturan
Route::get('/pengaturan', [PengaturanController::class, 'pengaturan']);
// route agenda
Route::get('/agenda', [MainController::class, 'agenda']);
// route info grafis
Route::get('/info-grafis', [MainController::class, 'infoGrafis']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
