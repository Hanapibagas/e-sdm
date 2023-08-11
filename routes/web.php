<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\KamarController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\GadungController;
use App\Http\Controllers\Admin\GaleryController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\SurveiController;
use App\Http\Controllers\Admin\BukutamuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\InfoGrafisController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\KritikSaranController;


// route login
Route::get('/', [LoginController::class,'index'])->name('index-login');
Route::get('/kritik/create', [KritikSaranController::class, 'create'])->name('create-kritik');
Route::get('/survei/create', [SurveiController::class, 'create'])->name('create-survei');
Route::get('/bukutamu/create', [BukutamuController::class, 'create'])->name('create-bukutamu');


// route dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware('auth', 'Checkrole:admin_utama')->group(function(){
    // route kritik dan saran
    Route::get('/kritik/index', [KritikSaranController::class, 'index'])->name('index-kritik');
    Route::post('/kritik/store', [KritikSaranController::class, 'store'])->name('store-kritik');
    Route::delete('/kritik/delete/{id}', [KritikSaranController::class, 'delete'])->name('delete-kritik');
    // route  survei
    Route::get('/survei/index', [SurveiController::class, 'index'])->name('index-survei');
    Route::post('/survei/store', [SurveiController::class, 'store'])->name('store-survei');
    Route::delete('/survei/delete/{id}', [SurveiController::class, 'delete'])->name('delete-survei');
    // route buku tamu
    Route::get('/bukutamu/index', [BukutamuController::class, 'index'])->name('index-bukutamu');
    Route::post('/bukutamu/store', [BukutamuController::class, 'store'])->name('store-bukutamu');
    Route::delete('/bukutamu/delete/{id}', [BukutamuController::class, 'delete'])->name('delete-bukutamu');
    // route video
    Route::get('/video/index', [VideoController::class, 'index'])->name('index-video');
    Route::post('/video/store', [VideoController::class, 'store'])->name('store-video');
    Route::get('/video/create', [VideoController::class, 'create'])->name('create-video');
    Route::get('/video/edit/{id}', [VideoController::class, 'edit'])->name('edit-video');
    Route::put('/video/update/{id}', [VideoController::class, 'update'])->name('update-video');
    Route::delete('/video/delete/{id}', [VideoController::class, 'delete'])->name('delete-video');
    // route galery
    Route::get('/galery/index', [GaleryController::class, 'index'])->name('index-galery');
    Route::get('/galery/create', [GaleryController::class, 'create'])->name('create-galery');
    Route::post('/galery/store', [GaleryController::class, 'store'])->name('store-galery');
    Route::get('/galery/edit/{id}', [GaleryController::class, 'edit'])->name('edit-galery');
    Route::put('/galery/update/{id}', [GaleryController::class, 'update'])->name('update-galery');
    Route::delete('/galery/delete/{id}', [GaleryController::class, 'delete'])->name('delete-galery');
    // route galery
    Route::get('/agenda/index', [AgendaController::class, 'index'])->name('index-agenda');
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('create-agenda');
    Route::post('/agenda/store', [AgendaController::class, 'store'])->name('store-agenda');
    Route::get('/agenda/edit/{id}', [AgendaController::class, 'edit'])->name('edit-agenda');
    Route::put('/agenda/update/{id}', [AgendaController::class, 'update'])->name('update-agenda');
    Route::delete('/agenda/delete/{id}', [AgendaController::class, 'delete'])->name('delete-agenda');
    // info grafis
    Route::get('/infografis/index', [InfoGrafisController::class, 'index'])->name('index-infografis');
    Route::post('/infografis/store', [InfoGrafisController::class, 'store'])->name('store-infografis');
    Route::get('/infografis/create', [InfoGrafisController::class, 'create'])->name('create-infografis');
    Route::get('/infografis/edit/{id}', [InfoGrafisController::class, 'edit'])->name('edit-infografis');
    Route::put('/infografis/update/{id}', [InfoGrafisController::class, 'update'])->name('update-infografis');
    Route::delete('/infografis/delete/{id}', [InfoGrafisController::class, 'delete'])->name('delete-infografis');
    // route pengumuman
    Route::get('/berita/index', [BeritaController::class, 'index'])->name('index-berita');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('create-berita');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('store-berita');
    Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->name('edit-berita');
    Route::put('/berita/update/{id}', [BeritaController::class, 'update'])->name('update-berita');
    Route::delete('/berita/delete/{id}', [BeritaController::class, 'delete'])->name('delete-berita');
    // route pengumuman
    Route::get('/pengaturan/index', [PengaturanController::class, 'index'])->name('index-pengaturan');
    Route::put('/pengaturan/update/{id}', [PengaturanController::class, 'update'])->name('update-pengaturan');

});

Auth::routes();
