<?php

namespace App\Http\Controllers;

use App\Models\Bukutamu;
use App\Models\Kritiksaran;
use App\Models\Survei;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $survei = Survei::all()->count();
        $kritiksaran = Kritiksaran::all()->count();
        $bukutamu = Bukutamu::all()->count();
        return view('dashboard.dashboard', compact('survei', 'kritiksaran', 'bukutamu'));
    }
}
