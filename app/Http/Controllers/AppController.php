<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $desa = Coordinate::all();
        return view('index', compact('desa'));
    }
}
