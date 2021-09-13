<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $desa = Desa::all();
        return view('index', compact('desa'));
    }
}
