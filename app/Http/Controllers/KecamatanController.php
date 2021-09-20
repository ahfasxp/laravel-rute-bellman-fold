<?php

namespace App\Http\Controllers;

use App\Models\coordinate;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('kecamatan.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coordinates = coordinate::all();
        return view('kecamatan.create', compact('coordinates'));
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
            'coordinate_id' => 'required|unique:kecamatan',
        ],);

        $kecamatan = new Kecamatan;

        $kecamatan->nama = $request->get('nama');
        $kecamatan->coordinate_id = $request->get('coordinate_id');
        $kecamatan->save();

        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        $kecamatan = Kecamatan::findOrFail($kecamatan->id);
        $coordinates = coordinate::all();
        return view('kecamatan.edit', compact('kecamatan', 'coordinates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'nama' => 'required|string|min:3',
            'coordinate_id' => 'required|unique:kecamatan',
        ],);

        $kecamatan = Kecamatan::findOrFail($kecamatan->id);

        $kecamatan->nama = $request->get('nama');
        $kecamatan->coordinate_id = $request->get('coordinate_id');
        $kecamatan->save();

        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan Berhasil di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan = Kecamatan::findOrFail($kecamatan->id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan Berhasil di Hapus!');
    }

    public function detail($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return $kecamatan;
    }
}
