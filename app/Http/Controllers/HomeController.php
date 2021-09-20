<?php

namespace App\Http\Controllers;

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
        $users = \App\Models\User::count();
        $desa = \App\Models\Desa::count();
        $kecamatan = \App\Models\Kecamatan::count();
        $kordinat = \App\Models\Coordinate::count();
        $graphs = \App\Models\Graph::count();
        return view('home', compact('users', 'desa', 'kecamatan', 'kordinat', 'graphs'));
    }
}
