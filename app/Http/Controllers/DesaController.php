<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::all();
        return view('desa.index', compact('desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3',
            'lat' => 'required|string|min:3',
            'long' => 'required|string|min:3',
        ],);

        $desa = new Desa;

        $desa->nama = $request->get('nama');
        $desa->latitude = $request->get('lat');
        $desa->longitude = $request->get('long');
        $desa->save();

        return redirect()->route('desa.index')->with('success', 'Desa Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $Desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $Desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $Desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        $desa = Desa::findOrFail($desa->id);
        return view('desa.edit', compact('desa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desa  $Desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        $request->validate([
            'nama' => 'required|string|min:3',
            'lat' => 'required|string|min:3',
            'long' => 'required|string|min:3',
        ],);

        $desa = Desa::findOrFail($desa->id);

        $desa->nama = $request->get('nama');
        $desa->latitude = $request->get('lat');
        $desa->longitude = $request->get('long');
        $desa->save();

        return redirect()->route('desa.index')->with('success', 'Desa Berhasil di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        $desa = Desa::findOrFail($desa->id);
        $desa->delete();
        return redirect()->route('desa.index')->with('success','Desa Berhasil di Hapus!');
    }
}
